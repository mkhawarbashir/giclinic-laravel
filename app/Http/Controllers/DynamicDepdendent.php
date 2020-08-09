<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\usermodel;
use Session;
use Exception;
use Carbon\Carbon;


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

        if($status=='All')
            $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date','=',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();
        else
            $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date','=',date('Y-m-d'))->where('Status','=',$status)->select('patient_personal.*','appointment.*')->get();
        
        //$patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date','=',date('Y-m-d'))->where('Status','=',$status)->select('patient_personal.*','appointment.*')->get();
       // $data = array('appointment_id'=>$request->input('apptID'),'patient_id'=>$request->input('patID'),'first_name'=>$request->input('first_name'),'last_name'=>$request->input('last_name'),"date"=>$request->input('date'),"time"=>$request->input('time'));
        return view('docDashboard', ['patient' => $patient, 'status'=>$status]);
    }

    public function addNewPrescription(Request $request)
    {
        $apptID = $request->input('appointment_id'); 
        
        $patID = $request->input('patient_id');
        $medicines = DB::table('medicine')->select('medicine_name')->get();
        $tests = DB::table('test')->select('test_name')->get();
        $patName = DB::table('patient_personal')->where('patient_id','=',$patID)->select('first_name','last_name')->get();
        
        return view('newPrescriptionForm', ['tests'=>$tests, 'medicines'=>$medicines, 'patient_id' => $patID, 'appointment_id' => $apptID, 'patient_fname'=>$patName[0]->first_name, 'patient_lname'=>$patName[0]->last_name]);

    }

    

    public function prescriptionData(Request $request){
        $chiefComp = $request->input('chiefComp');
        $examination = $request->input('examination');
        $proDiagnosis = $request->input('proDiagnosis');
        $diffDiagnosis = $request->input('diffDiagnosis');
        $labTests = $request->input('labTests');
        $labTests = implode(',', $labTests);
        $advice = $request->input('advice');
        $nxtVisitDate = $request->input('nxtVisitDate');
        $fee = $request->input('fee');
        $patient_id = $request->input('patient_id');
        $appointment_id = $request->input('appointment_id');
        $patient_fname = $request->input('patient_fname');
        $patient_lname = $request->input('patient_lname');

        $data = array('patient_id'=>$patient_id, 'appointment_id'=>$appointment_id, 'chief_complain'=>$chiefComp,'findings'=>$examination, 'prov_diagnosis'=>$proDiagnosis,'diff_diagnosis'=>$diffDiagnosis,'tests'=>$labTests, 'advices'=>$advice, 'next_visit_date'=>$nxtVisitDate,'fee'=>$fee);
       
        $res = DB::table('appointment_visit')->insert($data);
        
        $visit_id = DB::table('appointment_visit')->where("appointment_id","=",$appointment_id)->select("visit_id")->get();
       
        //protected $casts = ['type'=> 'array', 'drug'=> 'array', 'strength'=> 'array', 'dose'=> 'array', 'duration'=> 'array', 'advices'=> 'array'];

        $type = $request->input('type');
        $drug = $request->input('drug');
        $strength = $request->input('strength');
        $dose = $request->input('dose');
        $duration = $request->input('duration');
        $advices = $request->input('advices');

        
        $rec = count($request->type);
       // print($rec); 
        $j = 0;
        while ($j < $rec) {
            
            $data1 = array("visit_id"=>$visit_id[0]->visit_id, "sr_no"=>$j+1, "drug_type"=>$type[$j], "drug_name"=>$drug[$j], "drug_strength"=>$strength[$j], "drug_dose"=>$dose[$j], "drug_duration"=> $duration[$j], "drug_advice"=>$advices[$j]);
    
            DB::table('prescribed_medicine')->insert($data1);
            
            $j++;
         //   print("<br>");
           // print($j);
        }
    
        $data1 = array('Status'=>"Checked");
        
        usermodel::updateAppointment($data1,$patient_id,$appointment_id);

        $data2 = DB::table('prescribed_medicine')->where('visit_id','=',$visit_id[0]->visit_id)->get(); //array('type'=>$type,'drug'=>$drug, 'strength'=>$strength,'dose'=>$dose,'duration'=>$duration, 'advices'=>$advices);

        //$patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date','=',date('Y-m-d'))->where('Status','=','Arrived')->select('patient_personal.*','appointment.*')->get();

        return view('prescriptionPrint', ['pdrug'=> $data2, 'patient_fname'=>$patient_fname, 'patient_lname'=>$patient_lname, 'tests'=>$labTests, 'next_visit_date'=>$nxtVisitDate]);
        //return view('docDashboard', ['patient' => $patient, 'status'=>'Arrived']);//::make->nest('prescriptionPrint',$data2);
    }


    public function appointmentwithCNIC(Request $request){

        $cnic = $request->input('cnic');
        $patient = DB::table('patient_personal')->where('cnic','=',$cnic)->select('patient_personal.*')->get();

        if($patient->count() == 0){
            return redirect('newAppointmentwithID')->with('error', 'No record found with this ID');
        }
        else
            return view('newAppointmentDataForm', ['patient' => $patient]);
    }

    public function setTimeSlots(Request $request){

        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $slotTime = $request->input('slotTime');

        $current_date = Carbon::parse($startDate)->format('Y-m-d');
        $end_date = Carbon::parse($endDate)->format('Y-m-d');
        $end_date= (new Carbon($end_date))->addDays(0);
        $endTime = Carbon::parse($endTime)->format('h:i');
     
        while($current_date <= $end_date)
        {
     
            $current_time = $startTime;
            $current_time = Carbon::parse($current_time)->format('h:i');
        
            while($current_time < $endTime){
                
                $data = array("date"=>$current_date,"slot_time"=>Carbon::parse($current_time)->addMinutes(720)->format('h:i A'));
                DB::table('time_slots')->insert($data);
                
                $current_time = Carbon::parse($current_time);
                $current_time = $current_time->addMinutes($slotTime);
                $current_time = Carbon::parse($current_time)->format('h:i');
     
            }

            $current_date= (new Carbon($current_date))->addDays(1);
        //    print($current_date);
        }

        return view('timeSlotForm');
    }

    public function managetimeslot(){

        $timeslots = DB::table('time_slots')->select('time_slots.*')->get();

        //return view('viewAllPatientsForm', ['patient' => $patient]);
        return view('timeSlotManagement', ['slots' => $timeslots]);
        
    }

    public function updatetimeslot(Request $request){

        $date = $request->input('date');
        $slot_time= $request->input('slot_time');
        $availability= $request->input('availability');
        
        print($availability);
        
        $data = array('availability'=>$availability);
        
        $rec = DB::table('time_slots')->where('date','=',$date)->where('slot_time','=',$slot_time)->update($data);

        $timeslots = DB::table('time_slots')->select('time_slots.*')->get();

        //return view('viewAllPatientsForm', ['patient' => $patient]);
        return view('timeSlotManagement', ['slots' => $timeslots]);
        
    }

}
