<?php

use Illuminate\Http\Request;

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
// prefix를 붙이면 Route::post('/')이게 '/messages'란 거임
Route::prefix('messages')->
//인증한 유저만 api보낼수 있음
middleware('auth:api')->
group(function(){
   Route::post('/','MessageController@store');
   //주소는       도메인/api/messages
});

Route::get('/users', 'UserController@index');
