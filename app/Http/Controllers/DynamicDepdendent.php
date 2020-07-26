<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\usermodel;
use Session;
use Exception;


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
        $status = $request->input('cat');
        ////// If date is selected then datepicker date will be used if not then current system date
        $dat = $request->input('date');
        $date = $request->input('datepicker');
        $date = date('Y-m-d', strtotime($date));
        //print($dat);
        if($date=="1970-01-01")
            $dt = date('Y-m-d', strtotime($dat));
        else    
            $dt = $date;
        
        if($status=='All')
            $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date','=',$dt)->select('patient_personal.*','appointment.*')->get();
        else
        $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date','=',$dt)->where('Status','=',$status)->select('patient_personal.*','appointment.*')->get();
        
        return view('appointmentDetails', ['patient' => $patient,'date' => date('d-m-Y', strtotime($dt)), 'status'=>$status]);
    }

    public function getPatientPersonalwithID(Request $request)
    {
        $id = $request->input('id');

        $rec = DB::table("patient_personal")->where("patient_id", '=' ,$id)->get();
     
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
        $disease = implode(',', $disease);
        // print($disease);
        // print($fname);
        // print($dob);
        
        $data = array('first_name'=>$fname,"last_name"=>$lname,"contact_number"=>$phone,"city"=>$city,
                 'dob'=>$dob, 'country'=>$country, 'state'=>$state, 'address'=>$address, 'gender'=>$gender, 'disease'=>$disease);

        usermodel::updatePatientPersonal($data,$cnic);

        $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

        return view('appointmentDetails', ['patient' => $patient, 'date' => date('d-m-Y'), 'status'=>'All']);
    }

    public function addPatientData(Request $request)
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
        
        $data = array('first_name'=>$fname,"last_name"=>$lname,"cnic"=>$cnic,"contact_number"=>$phone,"city"=>$city,
                 'dob'=>$dob, 'country'=>$country, 'state'=>$state, 'address'=>$address, 'gender'=>$gender, 'disease'=>$disease);

        usermodel::addPatientPersonal($data);

        $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

        return view('appointmentDetails', ['patient' => $patient, 'date' => date('d-m-Y'), 'status'=>'All']);
    }

    public function addDiseaseData(Request $request)
    {
        $diseaseName = $request->input('diseaseName');
        $desc = $request->input('desc');
        
        $data = array('disease_name'=>$diseaseName,"description"=>$desc);
        try{
            usermodel::addNewDiseaseData($data);

            $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

            return view('appointmentDetails', ['patient' => $patient, 'date' => date('d-m-Y'), 'status'=>'All']);
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('info','Data Already Exists');
        }

    }

    public function addTestData(Request $request)
    {
        $testName = $request->input('tname');
        $tdesc = $request->input('tdesc');
        
        $data = array('test_name'=>$testName,"test_desc"=>$tdesc);
        try{
            usermodel::addNewTestData($data);

        
            $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

            return view('appointmentDetails', ['patient' => $patient, 'date' => date('d-m-Y'), 'status'=>'All']);
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('info','Data Already Exists');
        }
    }

    public function addMedicineData(Request $request)
    {
        $medName = $request->input('medname');
        $medType = $request->input('medtype');
        $medComp = $request->input('medcomp');
        $price = $request->input('price');
        $medContents = $request->input('medcontents');
        
        $data = array('medicine_name'=>$medName,'type'=>$medType,"contents"=>$medContents,"company"=>$medComp,"price"=>$price);
        try{
            usermodel::addNewmedicineData($data);

            $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

            return view('appointmentDetails', ['patient' => $patient, 'date' => date('d-m-Y'), 'status'=>'All']);
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('info','Data Already Exists');
        }

    }

    public function aPatient(Request $request)
    {

        $cnic = $request->input('cnic');

        $patient = DB::table('patient_personal')->select('patient_personal.*')->where('cnic','=',$cnic)->get();

        return view('viewAllPatientsForm', ['patient' => $patient]);
    }
    
    public function appointments(Request $request)
    {
        $id = $request->input('id');
        //$id = DB::table("patient_personal")->select('patient_id')->where("cnic",'=', $cnic)->get();
        $name = DB::table("patient_personal")->select('first_name')->where("patient_id",'=', $id)->get();
        $appointment = DB::table('appointment')->select('appointment.*')->where('patient_id','=',$id)->get();
        
        return view('viewPatientAppointmentsForm', ['appointment' => $appointment, 'name' => $name[0]->first_name]);
    }
    
    public function updateAppointment(Request $request)
    {
        $patID = $request->input('patient_id');
        $apptID = $request->input('appointment_id');
        $date = date('Y-m-d', strtotime($request->input('appointDate')));
        $time = $request->input('time');
        $status = $request->input('status');
        
        $data = array('Status'=>$status);
        
        usermodel::updateAppointment($data,$patID,$apptID);
        
        $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();
        
        return view('appointmentDetails', ['patient' => $patient, 'date' => date('d-m-Y'), 'status'=>'All']);
        
    }

    public function updateAppt(Request $request)
    {
        $patID = $request->input('patID');
        $apptID = $request->input('apptID');
        
        $adata = DB::table('appointment')->where('appointment_id','=',$apptID)->where('patient_id','=',$patID)->select('appointment.*')->get();
        $pdata = DB::table('patient_personal')->where('patient_id','=',$patID)->select('patient_personal.*')->get();
        return view('updateAppointmentForm', ['arec' => $adata, 'prec'=>$pdata]);
    }

    
    public function docDashboardData(Request $request)
    {
        $status = $request->input('status');
        $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date','=',date('Y-m-d'))->where('Status','=',$status)->select('patient_personal.*','appointment.*')->get();
       // $data = array('appointment_id'=>$request->input('apptID'),'patient_id'=>$request->input('patID'),'first_name'=>$request->input('first_name'),'last_name'=>$request->input('last_name'),"date"=>$request->input('date'),"time"=>$request->input('time'));
        return view('docDashboard', ['patient' => $patient, 'status'=>$status]);
    }

    public function addNewPrescription(Request $request)
    {
        $apptID = $request->input('appointment_id'); 
        
        $patID = $request->input('patient_id');
        $patName = DB::table('patient_personal')->where('patient_id','=',$patID)->select('first_name','last_name')->get();
        
        return view('newPrescriptionForm', ['patient_id' => $patID, 'appointment_id' => $apptID, 'patient_fname'=>$patName[0]->first_name, 'patient_lname'=>$patName[0]->last_name]);

    }

    public function prescriptionData(Request $request){
        $chfComp = $request->input('chfComp');
        $drug = $request->input('drug');
        //print($chfComp);
        //print($drug);

        return view('showPrescriptionData', ['comp'=>$chfComp,'drug'=>$drug]);

    }

    public function appointmentwithCNIC(Request $request){

        $cnic = $request->input('cnic');
        $patient = DB::table('patient_personal')->where('cnic','=',$cnic)->select('patient_personal.*')->get();

        return view('newAppointmentDataForm', ['patient' => $patient]);
    }
}
