<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=[
        'first_name',
        'last_name',
        'phone',
        'email',
        'from',
        'to',
        'guests',
        'notes'
    ];

    protected $dates=[
        'from',
        'to'
    ];

    /**
     * @param Carbon $datetime
     * @param $guests
     * @return array
     * @throws \Exception
     */
    static function checkTablesAvailability(Carbon $datetime,$guests){
        $arrTables=[];

        $from=  $datetime;
        $to=    (new Carbon($datetime->toDateTimeString()))->addHours(2);

        $tables = Table::all();
        $reservedTables=ReservedTable::whereBetween('from',[$from,$to])->orWhereBetween('to',[$from,$to])->pluck('table_id')->toArray();
        foreach ($tables as $table){
            $arrTables[]=[
                'id'=>$table->id,
                'status'=>in_array($table->id,$reservedTables)?'unavailable':'available',
                'name'=>$table->name,
            ];
        }
        return $arrTables;
    }
    public static function isReliableReservation($tablesIds, $guests){
        $total =0;
        $tables= Table::whereIn('id',$tablesIds)->get();
        $tables->each(function($table)use (&$total){
            $total += $table->seats;
        });

        if ($total-$guests>3){
            return false;
        }

        return true;
    }
    /**
     * @param $data
     * @param Carbon $datetime
     * @param $guests
     * @param $tables
     * @throws \Exception
     */
    static function reserve($data,Carbon $datetime,$guests,$tables){
        $from=  $datetime;
        $to=    (new Carbon($datetime->toDateTimeString()))->addHours(2);

        if (self::checkTablesInInterval($tables,$from,$to)){
            throw new \Exception("Tables are already reserved in this interval.");
        }
        $reservation = Reservation::create([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['phone'],
            'notes'=>$data['notes'],
            'email'=>$data['email'],
            'guests'=>$guests,
            'from'=>$from,
            'to'=>$to
        ]);
        foreach($tables as $table){
            ReservedTable::create([
                'table_id'=>$table,
                'reservation_id'=>$reservation->id,
                'from'=>$from,
                'to'=>$to
            ]);
        }
    }

    /**
     * @param array $tables
     * @return boolean
     */
    static function checkTablesInInterval($tables,Carbon $from,Carbon $to){

        $count = ReservedTable::whereBetween('from',[$from,$to])->orWhereBetween('to',[$from,$to])->whereIn('table_id',$tables)->count();
        return $count;
    }
}
