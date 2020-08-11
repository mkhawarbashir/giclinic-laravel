<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    //
    public $timestamps = false;

    public static function loaddata()
    {
        return DB::table('patient_personal')->get();
    }

    public static function insert_patient_personal($data){
        $value=DB::table('patient_personal')->where('cnic','=', $data['cnic'])->get();
        if($value->count() == 0){
          DB::table('patient_personal')->insert($data);
          return 1;
         }else{
          return 0;
         }
      }


    public static function insert_appointment($data, $forid){ ///Need to work on this
        $date = $data['date'];
        $time = $data['time'];
        
        $id = DB::table('patient_personal')->where('cnic', '=', $forid['cnic'])->value('patient_id');
        $value = DB::table('appointment')->where('date', '=', $data['date'])->where('time', '=', $data['time'])->get();
        $iddata = array('patient_id'=>$id);
        $aptData = array('availability'=>0);
        $data = $iddata + $data;
        if($id != '' && $value->count() == 0){
          DB::table('appointment')->insert($data);
         
          DB::table('time_slots')->where('date', '=', $data['date'])->where('slot_time', '=', $data['time'])->update($aptData);
          return 1;
         }else{
          return 0;
         }
     
    }

    public static function updateAppointment($data, $patID, $apptID){
      
     $ab =  DB::table('appointment')->where('appointment_id','=', $apptID)->where('patient_id','=',$patID)->update($data);
     
      return $ab;

    }

    public static function updatePatientPersonal($data, $cnic){

      DB::table('patient_personal')->where('cnic','=', $cnic)->update($data);
      return 1;

    }

    public static function addPatientPersonal($data){

      DB::table('patient_personal')->insert($data);
      return 1;

    }
    
    public static function addNewDiseaseData($data){

      return DB::table('disease')->insert($data);
      //return 1;

    }

    public static function addNewTestData($data){

      return DB::table('test')->insert($data);
      //return 1;

    }

    public static function addNewMedicineData($data){

      return DB::table('medicine')->insert($data);
      //return 1;

    }
}
