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

Route::get('/', function () {
    exi('xx');
    return view('welcome');
});

Route::get('/landing_page', function () {
    return view('layout_test');
})->name('landing.page');

Route::resource('sewaKendaraan', 'VehiclesRentController');
Route::resource('rekapSewaKendaraan', 'RecapVehiclesRentController')->only('index');

