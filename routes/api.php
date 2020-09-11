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

Route::group(['namespace' => 'App\Http\Controllers\API'], function() {

    Route::post('clients', 'ClientController@save');
    Route::put('clients/{id}', 'ClientController@update');
    Route::get('clients', 'ClientController@items');
    Route::get('clients/{id}', 'ClientController@item');
    Route::delete('clients/{id}', 'ClientController@remove');

    Route::post('projects', 'ProjectController@save');
    Route::put('projects/{id}', 'ProjectController@update');
    Route::get('projects', 'ProjectController@items');
    Route::get('projects/{id}', 'ProjectController@item');
    Route::delete('projects/{id}', 'ProjectController@remove');

});
