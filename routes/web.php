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

Route::get('/appointmentDetails', function () {
    return view('appointmentDetails');
});

Route::post('appointmentsubmit','usercontroller@appointmentsubmit');
Route::post('loaddata','usercontroller@loaddata');
Route::get('welcome/ajax/{id}','DynamicDepdendent@welcomeAjax');

//Route::get('blog', 'BlogPagesController@blog_index');

/*Routes created for blog related pages using Route::resource('posts', 'BlogPagesController').
    It will automatically create all necessary routes required for BlogPagesController. [MN - 11.Jun.2020]*/
Route::resource('posts', 'BlogPagesController');

//Define route for file upload. [MN - 11.Jun.2020]
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
