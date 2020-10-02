<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentHomeController extends Controller
{
    
    public function home()
    {
        
        $temp="select * from upcomingevents where Date  >= DATE(NOW())";
        $temp=DB::select($temp);
        

        return view('studentHome',['UpcomingActivites'=>$temp]);
    }

    public function StudentAttendance()
    {
        
        // $temp="select * from upcomingevents where Date  >= DATE(NOW())";
        // $temp=DB::select($temp);
        

        // return view('studentHome',['UpcomingActivites'=>$temp]);
        return view('studentAttendance');
    }


    
}

