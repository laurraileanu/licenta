<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('/user', UserController::class);
    $router->resource('/rezervari', ReservationsController::class);
    $router->resource('/restaurant', RestaurantController::class);
    $router->resource('/zile', WorkingdaysController::class);
});
