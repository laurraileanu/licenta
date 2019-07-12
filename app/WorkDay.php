<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    protected $fillable =[
        'name',
        'from',
        'to',
    ];
    public $timestamps = false;
    public static function getWorkingHours(Carbon $datetime){
        $day = self::find($datetime->dayOfWeek+1);
        return $day;
    }
    public static function isInWorkingHours(Carbon $datetime){
        $workingHours = self::getWorkingHours($datetime);
        $from = Carbon::createFromFormat("d/m/Y H:i","{$datetime->format('d/m/Y')} {$workingHours->from}");
        $to = Carbon::createFromFormat("d/m/Y H:i","{$datetime->format('d/m/Y')} {$workingHours->to}");
        if ($from->getTimestamp() > $datetime->getTimestamp() || $to->getTimestamp() < $datetime->getTimestamp()){
            return false;
        }
        return true;
    }
}
