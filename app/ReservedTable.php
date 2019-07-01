<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservedTable extends Model
{
    protected $table = "reservation_tables";
    protected $fillable=[
        'table_id',
        'reservation_id',
        'from',
        'to'
    ];
    const  STATUS_AVAILABLE="available";
    const STATUS_UNAVAILABLE="unavailable";
    //
}
