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
    

}
