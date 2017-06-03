<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get(
    'logout',
    [
        'as' => 'logout',
        'uses' => 'Auth\LoginController@logout'
    ]
);

Route::get(
    '/',
    [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]
);

Route::get(
    'route/{routeId}',
    [
        'as' => 'route.show',
        'uses' => 'RouteController@show'
    ]
);
