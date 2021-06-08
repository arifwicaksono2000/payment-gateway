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

Route::get('/payment/{buyer_name}/{tr_id}', function ($buyerName, $idTr) {
    return view('index')->with('buyer_name',$buyerName)->with('tr_id',$idTr);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
