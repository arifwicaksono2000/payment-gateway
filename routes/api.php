<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user_db/user', 'UserDbController@user');
Route::get('/user_db/transaction', 'UserDbController@trans');


Route::post('/transaction', 'TransactionController@index');
Route::post('/transaction/type', 'TransactionController@type');
Route::get('/transaction/user', 'TransactionController@user');
Route::get('/transaction/transaction', 'TransactionController@trans');
Route::get('/transaction/flip', 'TransactionController@flip');

// Integrasi ke Markopedia
// Route::post('/transaction/url', 'TransactionController@index');