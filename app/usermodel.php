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
        $value=DB::table('patient_personal')->where('cnic', $data['cnic'])->get();
        if($value->count() == 0){
          DB::table('patient_personal')->insert($data);
          return 1;
         }else{
          return 0;
         }
      }


    public static function insert_appointment($data, $forid){ ///Need to work on this
        $id = DB::table('patient_personal')->where('cnic', $forid['cnic'])->value('patient_id');
        $value = DB::table('appointment')->where('date', $data['date'])->where('time', $data['time'])->get();
        $iddata = array('patient_id'=>$id);
        $data = $iddata + $data;
        if($id != '' && $value->count() == 0){
          DB::table('appointment')->insert($data);
          return 1;
         }else{
          return 0;
         }
     
    }

    public static function updatePatientPersonal($data, $cnic){

      DB::table('patient_personal')->where('cnic','=', $cnic)->update($data);
      return 1;

    }

}
