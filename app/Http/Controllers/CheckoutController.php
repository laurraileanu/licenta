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

        return response()->json(['redirect'=>route('reservation.checkout')]);
    }
    public function run()
    {
        \App\Table::query()->truncate();
        //
        \App\Table::create(
            ['name'=>'A']
        );
        \App\Table::create(
            ['name'=>'B']
        );
        \App\Table::create(
            ['name'=>'C']
        );
        \App\Table::create(
            ['name'=>'D']
        );
        \App\Table::create(
            ['name'=>'E']
        );
        \App\Table::create(
            ['name'=>'F']
        );
        \App\Table::create(
            ['name'=>'G']
        );
        \App\Table::create(
            ['name'=>'H']
        );
        \App\Table::create(
            ['name'=>'I']
        );
        \App\Table::create(
            ['name'=>'J']
        );
        \App\Table::create(
            ['name'=>'K']
        );
        \App\Table::create(
            ['name'=>'L']
        );
        \App\Table::create(
            ['name'=>'M']
        );
        \App\Table::create(
            ['name'=>'N']
        );
        \App\Table::create(
            ['name'=>'O']
        );
        \App\Table::create(
            ['name'=>'P']
        );
        \App\Table::create(
            ['name'=>'Q']
        );
        \App\Table::create(
            ['name'=>'R']
        );
        \App\Table::create(
            ['name'=>'S']
        );
        \App\Table::create(
            ['name'=>'T']
        );
        \App\Table::create(
            ['name'=>'U']
        );
        \App\Table::create(
            ['name'=>'V']
        );
        \App\Table::create(
            ['name'=>'W']
        );
        \App\Table::create(
            ['name'=>'X']
        );
        \App\Table::create(
            ['name'=>'Y']
        );
    }
}