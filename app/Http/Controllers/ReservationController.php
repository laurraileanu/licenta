<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvailableTablesRequest;
use App\Http\Requests\ReserveRequest;
use App\Reservation;
use App\WorkDay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Create a new controller instance.
     * @param AvailableTablesRequest $request
     * @return string
     */
    public function getAvailableTables(AvailableTablesRequest $request)
    {
        $data= $request->all(['time','date','guests']);
        $datetime = Carbon::createFromFormat("d/m/Y H:i","{$data['date']} {$data['time']}");
        if (!WorkDay::isInWorkingHours($datetime)){
            throw ValidationException::withMessages(['time'=>'Restaurantul este inchis la aceasta ora']);
        }


        $tables = Reservation::checkTablesAvailability($datetime,$data['guests']);
  
        return response()->json(['tables'=>$tables]);
    }

    public function reserve(AvailableTablesRequest $request)
    {

        $data= $request->all(['time','date','guests','selectedTables']);
        $request->session()->put('currentReservation',$data);

        return response()->json(['redirect'=>route('reservation.checkout')]);
    }


}