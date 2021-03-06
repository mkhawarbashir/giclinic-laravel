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

    public function newPatientDataForm(){

        return view('newPatientDataForm');
    }
    
    public function newDiseaseDataForm(){

        return view('newDiseaseDataForm');
    }

    public function newTestDataForm(){

        return view('newTestDataForm');
    }

    public function newMedicineDataForm(){

        return view('newMedicineDataForm');
    }

    public function newAppointmentDataForm(){

        return view('newAppointmentDataForm');
    }

    public function viewAllPatientsForm(){

        return view('viewAllPatientsForm');
    }
    
    public function viewPatientAppointmentsForm(){

        return view('viewPatientAppointmentsForm');
    }
    
    public function updateAppointmentForm(){

        return view('updateAppointmentForm');
    }
    
    public function docDashboard(){

        return view('docDashboard');
    }
    
    public function newPrescriptionForm(){

        return view('newPrescriptionForm');
    }
    
    public function showPrescriptionData(){

        return view('showPrescriptionData');
    }
    
    public function newAppointmentwithID(){

        return view('newAppointmentwithID');
    }
    
    public function prescriptionPrint(){

        return view('prescriptionPrint');
    }

    public function timeSlotForm(){

        return view('timeSlotForm');
    }
    
    public function timeSlotManagement(){

        return view('timeSlotManagement');
    }
}

