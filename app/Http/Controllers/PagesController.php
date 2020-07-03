<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        return view('welcome');
    }

    public function clinicUser(){

        return view('clinic_user');
    }

    public function appointmentDetails(){

        return view('appointmentDetails');
    }

    public function patientDataForm(){

        return view('patientDataForm');
    }
    
}
