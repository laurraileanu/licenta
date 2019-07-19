<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Reservation;
use App\Table;
use Carbon\Carbon;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\InfoBox;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')

            ->row(function (Row $row) {
                $row->column(4, function (Column $column) {
                    $infoBox = new InfoBox('Rezervari pentru azi', 'clock-o', 'red', '/admin/rezervari',
                        Reservation::whereDate('to', Carbon::today())->count());
                    $column->append($infoBox->render());
                });

                $row->column(4, function (Column $column) {
                    $infoBox = new InfoBox('Rezervari ultima saptamana', 'users', 'yellow', '/admin/rezervari',
                        Reservation::whereBetween('created_at', [Carbon::today()->subWeek()->startOfDay(),Carbon::today()->endOfDay()])->count());
                    $column->append($infoBox->render());
                });


                $row->column(4, function (Column $column) {
                    $infoBox = new InfoBox('Rezervari facute astazi', 'calendar-check-o', 'green', '/admin/rezervari',
                        Reservation::whereDate('created_at', Carbon::today())->count());
                    $column->append($infoBox->render());
                });
            })
            ->row(function (Row $row) {
                $headers = ['E-mail', 'Telefon', 'Prenume', 'Nume', 'Data', 'Invitati'];

                $users = Reservation::whereDate('to',Carbon::today())->orderBy('created_at', 'desc')->take(10)->get()->map(function ($item) {
                    return [
                        'email' => $item->email,
                        'phone' => $item->phone,
                        'first_name' => $item->first_name,
                        'last_name' => $item->last_name,
                        'from'=> $item->from,
                        'guests' => $item->guests
                    ];
                })->toArray();
                $row->column(6,(new Box('Rezervarile de azi.', new \Encore\Admin\Widgets\Table($headers, $users)))->style('info')->solid());
                $users = Reservation::orderBy('created_at', 'desc')->take(10)->get()->map(function ($item) {
                    return [
                        'email' => $item->email,
                        'phone' => $item->phone,
                        'first_name' => $item->first_name,
                        'last_name' => $item->last_name,
                        'from'=> $item->from,
                        'guests' => $item->guests
                    ];
                })->toArray();
                $row->column(6,(new Box('Ultimele rezervari.', new \Encore\Admin\Widgets\Table($headers, $users)))->style('info')->solid());

            });
    }
}
