<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudentHomeController extends Controller
{
    
    public function home()
    {
        //
        $temp="select * from upcomingevents";
        $temp=DB::select($temp);
        // dd($temp);

        return view('studentHome',['UpcomingActivites'=>$temp]);
    }

}
