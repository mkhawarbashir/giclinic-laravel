<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usermodel;
use Session;
use DB;

class usercontroller extends Controller
{
    //

  //  function appointmentsubmit(Request $req)
   // {
     //   print_r(usermodel::all());

    //}

    function loaddata(Request $req)
    {
        
        print_r (usermodel::loaddata());
        
    }

    public function appointmentsubmit(Request $request){
 
        // Insert record
             $fname = $request->input('fname');
             $lname = $request->input('lname');
             $cnic = $request->input('cnic');
             $phone = $request->input('phone');
             $city = $request->input('city');
             $date = $request->input('datepicker');
             $time = $request->input('time');
             $forid = array('cnic'=>$cnic);
    
             if($fname !='' && $lname !='' && $cnic != '' && $phone != '' && $city != '' && $date !='' && $time != ''){
                $data = array('first_name'=>$fname,"last_name"=>$lname,"cnic"=>$cnic,"contact_number"=>$phone,"city"=>$city);
                $data1 = array('date'=>date('Y-m-d', strtotime($date)), 'time'=>$time,'type'=>'Online');
                // Insert
                $value = usermodel::insert_patient_personal($data);
              
                $patID = DB::table('patient_personal')->where('cnic','=',$cnic)->value('patient_id');

                
                $res = DB::table('appointment')->where(['patient_id'=>$patID, 'date'=>date('Y-m-d', strtotime($date))])->get();
                //$res = DB::table('appointment')->where(['date','=',strtotime($date),'patient_id','=',$patID])->select('appointment_id')->get();

                if($res->count() == 0){
                    $value = usermodel::insert_appointment($data1, $forid);
                    if($value==1){ 
                    return redirect('/')->with('success','Dear '. $fname . ' '. $lname . '. Your appointment for '. $date . ' at '. $time . ' has been made successfully');
                    }
                    else{
                        return redirect('/')->with('info', 'Selected date or time has already been booked. Select any other.');   
                    }
                }
                else{

                    return redirect('/')->with('info', 'Appointment for this ID has already been made for this date.');

                }
             }
             else{
                 
                 return redirect('/')->with('info', 'Fill in the required information');
             }

      }

      public function newappointmentsubmit(Request $request){
 
        // Insert record
             $fname = $request->input('fname');
             $lname = $request->input('lname');
             $cnic = $request->input('cnic');
             $phone = $request->input('phone');
             $city = $request->input('city');
             $date = $request->input('doapicker');
             $time = $request->input('time');
             $forid = array('cnic'=>$cnic);
    
             if($fname !='' && $lname !='' && $cnic != '' && $phone != '' && $city != '' && $date !='' && $time != ''){

                $data = array('first_name'=>$fname,"last_name"=>$lname,"cnic"=>$cnic,"contact_number"=>$phone,"city"=>$city);
                $data1 = array('date'=>date('Y-m-d', strtotime($date)), 'time'=>$time,'type'=>'Online');
                // Insert
                $value = usermodel::insert_patient_personal($data);
              
                $patID = DB::table('patient_personal')->where('cnic','=',$cnic)->value('patient_id');
                
                $res = DB::table('appointment')->where(['patient_id'=>$patID, 'date'=>date('Y-m-d', strtotime($date))])->get();
                
                //print($res);
                if($res->count() == 0){
                    $value = usermodel::insert_appointment($data1, $forid);
                    
                    $patient = DB::table('patient_personal')->join('appointment', 'patient_personal.patient_id','=','appointment.patient_id')->where('date',date('Y-m-d'))->select('patient_personal.*','appointment.*')->get();

                    return view('appointmentDetails', ['patient' => $patient, 'date'=>date('d-m-Y'), 'status'=>'All'])->with('info', 'Appointment has been made');
                }
                else{

                    return redirect('/newAppointmentwithID')->with('info', 'Appointment for this ID has already been made for this date.');

                }   
             }
             else{
                 
                 return redirect('/newAppointmentDataForm')->with('info', 'Fill in the required information');
             }

      }
}
