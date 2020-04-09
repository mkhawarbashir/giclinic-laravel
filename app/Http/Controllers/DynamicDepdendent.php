<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

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


}
