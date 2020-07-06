<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/', 'PagesController@index');
Route::get('/clinic_user', 'PagesController@clinicUser');
Route::get('/appointmentDetails', 'PagesController@appointmentDetails');
Route::get('/patientDataForm', 'PagesController@patientDataForm');
Route::get('/newPatientDataForm', 'PagesController@newPatientDataForm');
Route::get('/newDiseaseDataForm', 'PagesController@newDiseaseDataForm');
Route::get('/newTestDataForm', 'PagesController@newTestDataForm');
Route::get('/newMedicineDataForm', 'PagesController@newMedicineDataForm');
Route::get('/newAppointmentDataForm', 'PagesController@newAppointmentDataForm');
Route::get('/viewAllPatientsForm', 'PagesController@viewAllPatientsForm');

Route::post('appointmentsubmit','usercontroller@appointmentsubmit');
Route::post('newappointmentsubmit','usercontroller@newappointmentsubmit');
Route::post('loaddata','usercontroller@loaddata');
Route::get('welcome/ajax/{id}','DynamicDepdendent@welcomeAjax');
Route::post('appointmentDetail','DynamicDepdendent@appointDetail');
Route::get('patientData/{id}','DynamicDepdendent@getPatientPersonalwithID');
Route::post('updatePatient','DynamicDepdendent@updatePatientData');
Route::post('addNewPatient','DynamicDepdendent@addPatientData');
Route::post('addNewDisease','DynamicDepdendent@addDiseaseData');
Route::post('addNewTest','DynamicDepdendent@addTestData');
Route::post('addNewMedicine','DynamicDepdendent@addMedicineData');
Route::post('viewAPatient','DynamicDepdendent@aPatient');

//Function to return data for Home Page
Route::get('appointmentDetails', function () {

    //Current date induction missing
//    $patient = DB::table('patient_personal')->get();
//    $appoint = DB::table('appointment')->get();

    $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

    return view('appointmentDetails', ['patient' => $patient]);
});

Route::get('viewAllPatientsForm', function () {

    //Current date induction missing
//    $patient = DB::table('patient_personal')->get();
//    $appoint = DB::table('appointment')->get();

    $patient = DB::table('patient_personal')->get();

    return view('viewAllPatientsForm', ['patient' => $patient]);
});


//Route::get('blog', 'BlogPagesController@blog_index');

/*Routes created for blog related pages using Route::resource('posts', 'BlogPagesController').
    It will automatically create all necessary routes required for BlogPagesController. [MN - 11.Jun.2020]*/
Route::resource('posts', 'BlogPagesController');

//Define route for file upload. [MN - 11.Jun.2020]
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Auth::routes();

//Route::get('/home', 'DashboardController@index')->name('dashboard'); //[MN - Commented out 27.06.2020]

Auth::routes();
//Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); //[MN - Commented out 27.06.2020]
Route::get('/dashboard', 'DashboardController@index'); /*[MN - Changed from home to dashboard. 27.06.2020]*/
