<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Login Routes
// Route::get('/staff', 'StaffController@show');

// Staff Routes
Route::get('/staff', 'StaffController@show');
Route::get('/staff/add', 'StaffController@create');
Route::post('/staff', 'StaffController@store');
Route::get('/staff/{staff}/edit', 'StaffController@edit');
Route::put('/staff/{staff}', 'StaffController@update');
Route::delete('/staff/{staff}', 'StaffController@destory');


//Student Routes
Route::get('/student', 'StudentController@show');
Route::get('/student/add', 'StudentController@create');
Route::post('/student', 'StudentController@store');
Route::get('/student/{student}/edit', 'StudentController@edit');
Route::put('/student/{student}', 'StudentController@update');
Route::delete('/student/{student}', 'StudentController@destory');

//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
