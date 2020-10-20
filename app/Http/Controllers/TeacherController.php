<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function home(){
        return view('teacherHome');
    }
    public function attendanceForm(){
        return view('attendanceForm');
    }

    public function attendanceFormPost(Request $request){
        // $temp=$request;
        // $temp=$request->input('fromtime');
        $temp=$request->input('yearSelect');
        dd($temp);
    }
}
