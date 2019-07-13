<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentReservation = $request->session()->get('currentReservation');
        if (!$currentReservation){
            return redirect(route('reservation.setup'));
        }
        return view('pages.checkout',['currentReservation'=>$currentReservation])->withProducts(collect([]));
    }


    public function submit(ReserveRequest $request)
    {
        $data= $request->all(['first_name','last_name','email','phone','notes']);

        $currentReservation= $request->session()->get('currentReservation');
        if (!$currentReservation) {
            throw ValidationException::withMessages(['message'=>'Sesiunea a expirat']);
        }

        $datetime = Carbon::createFromFormat("d/m/Y H:i","{$currentReservation['date']} {$currentReservation['time']}");
        try{
            Reservation::reserve($data,$datetime,$currentReservation['guests'],$currentReservation['selectedTables']);
        }catch(\Exception $e){
            throw ValidationException::withMessages(['message'=>$e->getMessage()]);
        }

        return response()->json(['redirect'=>route('thank')]);
    }
}