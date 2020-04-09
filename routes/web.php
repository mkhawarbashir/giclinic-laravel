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
    return view('welcome');
});

Route::get('/clinic_user', function () {
    return view('clinic_user');
});

Route::post('appointmentsubmit','usercontroller@appointmentsubmit');
Route::post('loaddata','usercontroller@loaddata');
Route::get('welcome/ajax/{id}','DynamicDepdendent@welcomeAjax');
