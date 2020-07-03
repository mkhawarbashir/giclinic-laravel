<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\usermodel;
use Session;


class DynamicDepdendent extends Controller
{
    //

    public function welcomeAjax($date)
    {
        $dt = date('Y-m-d', strtotime($date));
        
        //console.log($qr);
        //$times = DB::select("SELECT time FROM `appointment` WHERE date='?'", [$dt]);
        //$times = DB::table("appointment")->where("date",$dt)->value('time');
        $times = DB::table("appointment")->select('time')->where("date", $dt)->get();
                    
        return json_encode($times);
    }

    public function appointDetail(Request $request)
    {
        //console.log($request);
        $date = $request->input('datepicker');
        $dt = date('Y-m-d', strtotime($date));
        //print($dt);
        $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',$dt)->select('patient_personal.*','appointment.*')->get();
        
        return view('appointmentDetails', ['patient' => $patient]);
    }

    public function getPatientPersonalwithID($cnic)
    {
        $rec = DB::table("patient_personal")->where("cnic", $cnic)->get();
     
        return View('patientDataForm', ['rec' => $rec]);//->with('rec',$rec);
     
    }

    public function updatePatientData(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $cnic = $request->input('cnic');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $dob = date('Y-m-d', strtotime($request->input('datepicker')));
        $country = $request->input('country');
        $state = $request->input('state');
        $address = $request->input('address');
        $gender = $request->input('gender');
        $disease = $request->input('disease');
        // print($disease);
        // print($fname);
        // print($dob);
        
        $data = array('first_name'=>$fname,"last_name"=>$lname,"contact_number"=>$phone,"city"=>$city,
                 'dob'=>$dob, 'country'=>$country, 'state'=>$state, 'address'=>$address, 'gender'=>$gender, 'disease'=>$disease);

        usermodel::updatePatientPersonal($data,$cnic);

        $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

        return view('appointmentDetails', ['patient' => $patient]);
    }

}
