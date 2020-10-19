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
        // Upcoming events
        $UActivities="select * from upcomingevents where Date  >= DATE(NOW())";
        $UActivities=DB::select($UActivities);
        // Marks Table
        $AllSubjects="SELECT * from (SELECT * FROM Marks as m
        JOIN Subject as s
        on(m.SubFk=s.SubjectName)
        join Exams as e
        on (e.id=m.ExamFk)
        WHERE m.SFK= $id ) allrows
        where sem=(SELECT MAX(sem) FROM Marks as m
        JOIN Subject as s
        on(m.SubFk=s.SubjectName)
        WHERE m.SFK= $id )";
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





