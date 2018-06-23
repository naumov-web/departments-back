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

Route::get('departments', 'DepartmentsController@index');
Route::get('departments/{department}', 'DepartmentsController@item');
Route::post('departments', 'DepartmentsController@create');
Route::put('departments/{department}', 'DepartmentsController@update');
Route::delete('departments/{department}', 'DepartmentsController@delete');

Route::get('staffes', 'StaffesController@index');
Route::get('staffes/{staff}', 'StaffesController@item');
Route::post('staffes', 'StaffesController@create');
Route::put('staffes/{staff}', 'StaffesController@update');
Route::delete('staffes/{staff}', 'StaffesController@delete');