<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usermodel;
use Session;

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
              
                $value = usermodel::insert_appointment($data1, $forid);
                if($value){ 
                return redirect('/')->with('success','Dear '. $fname . ' '. $lname . '. Your appointment for '. $date . ' at '. $time . ' has been made successfully');
                }
                else{
                    return redirect('/')->with('info', 'Selected date or time has already been booked. Select any other.');   
                }
             }
             else{
                 
                 return redirect('/')->with('info', 'Fill in the required information');
             }

      }
}
