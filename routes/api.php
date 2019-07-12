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

//Route::group(['middleware' => ['cors2']], function(){
    Route::middleware('api')->post('/landingbot/{id_bot}/answers', 'AnswersController@store');
//});

//Route::post('/landingbot/{id_bot}/answers', 'AnswersController@store');
Route::middleware('api')->get('/landingbot/{id_bot}', 'LandingBotController@show');

Route::middleware('api')->post('/landingbot/{id_bot}/poststats', 'StatsController@create');

