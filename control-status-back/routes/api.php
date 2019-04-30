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

 /**
  *
  * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
  * @version 1.0
  * @api
  */
Route::group(['prefix'=> 'status'], function()
{
    Route::get('', 'StatusController@index');
    Route::get('create', 'StatusController@create');
    Route::post('', 'StatusController@store');
    Route::get('{status}', 'StatusController@show');
    Route::get('{status}/edit', 'StatusController@edit');
    Route::put('{status}', 'StatusController@update');
    Route::delete('{status}', 'StatusController@destroy');

});

Route::group(['prefix'=> 'simulator'], function()
{
    Route::get('', 'SimulatorController@index');
    Route::get('create', 'SimulatorController@create');
    Route::post('', 'SimulatorController@store');
    Route::get('{status}', 'SimulatorController@show');
    Route::get('{status}/edit', 'SimulatorController@edit');
    Route::put('{status}', 'SimulatorController@update');

});

Route::group(['prefix'=> 'machine'], function()
{
    Route::get('', 'MachineController@index');
    Route::get('create', 'MachineController@create');
    Route::post('', 'MachineController@store');
    Route::get('{status}', 'MachineController@show');
    Route::get('{status}/edit', 'MachineController@edit');
    Route::put('{status}', 'MachineController@update');

});

Route::group(['prefix'=> 'eventmachine'], function()
{
    Route::get('', 'EventMachineController@index');
    Route::get('create', 'EventMachineController@create');
    Route::post('', 'EventMachineController@store');
    Route::get('{status}', 'EventMachineController@show');
    Route::get('{status}/edit', 'EventMachineController@edit');
    Route::put('{status}', 'EventMachineController@update');
    Route::delete('{status}', 'EventMachineController@destroy');

});