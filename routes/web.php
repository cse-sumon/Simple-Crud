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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','EmployeeController@index');
Route::post('saveData','EmployeeController@saveData');
Route::get('getData','EmployeeController@getData');
Route::get('editData/{id}','EmployeeController@editData');
Route::post('updateData/{id}','EmployeeController@updateData');
Route::get('deleteData/{id}','EmployeeController@deleteData');