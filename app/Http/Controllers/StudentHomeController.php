<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class StudentHomeController extends Controller
{
    
    public function home()
    {
        
        $user = Auth::user();
        $id = Auth::id();
        $UActivities="select * from upcomingevents where Date  >= DATE(NOW())";
        $UActivities=DB::select($UActivities);

        $AllSubjects="SELECT * FROM `Marks` WHERE SFK= $id";
        $AllSubjects=DB::select($AllSubjects);
        // dd($AllSubjects);
        

        return view('studentHome',['UpcomingActivites'=>$UActivities,'AllSubjects'=>$AllSubjects]);
    }

    public function StudentAttendance()
    {
        
        // $temp="select * from upcomingevents where Date  >= DATE(NOW())";
        // $temp=DB::select($temp);
        

        // return view('studentHome',['UpcomingActivites'=>$temp]);
        return view('studentAttendance');
    }




    
}

// SELECT * FROM `Marks` as m
// JOIN Subject as s
// on(m.SubFk=s.SubjectName)
// WHERE m.SFK= 1;