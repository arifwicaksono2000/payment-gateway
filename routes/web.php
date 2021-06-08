<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/status', function () {
    return view('status');
});

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/payment/{buyer_name}/{total_payment}', function ($buyerName, $totalPayment) {
    return view('index',[
        'total_payment'=>$totalPayment,
        'buyer_name'=>$buyerName
        ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
