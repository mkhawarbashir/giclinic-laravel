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
    
             if($fname !='' && $lname !='' && $cnic != '' && $phone != '' && $city != ''){
                $data = array('first_name'=>$fname,"last_name"=>$lname,"cnic"=>$cnic,"contact_number"=>$phone,"city"=>$city);
     
                // Insert
                $value = usermodel::insert_patient_personal($data);
              //  if($value){
                //  Session::flash('message','Insert successfully.');
                //}else{
                 // Session::flash('message','Username already exists.');
               // }
     
             }
             if($value){
                 
                return redirect('/')->with('success','Record has been submitted successfully');
             }
             else{
                 
                 return redirect('/')->with('info', 'Record Already Exists');
             }

      }
}
