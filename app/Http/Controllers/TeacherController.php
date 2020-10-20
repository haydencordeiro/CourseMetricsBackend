<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class TeacherController extends Controller
{
    public function home(){
        return view('teacherHome');
    }
    public function attendanceForm(){
        $user = Auth::user();
        $id = Auth::id();
        $semList="SELECT Distinct sem from Subject where TFk=$id;";
        $semList=DB::select($semList);

        
        return view('attendanceForm',['semList'=>$semList,'allStudent'=>array()]);
    }

    public function attendanceFormPost(Request $request){
        $user = Auth::user();
        $id = Auth::id();
        $semList="SELECT Distinct sem from Subject where TFk=$id;";
        $semList=DB::select($semList);


        $semSelect=$request->input('semSelect');
        $deptSelect=$request->input('deptSelect');
        $classSelect=$request->input('classSelect');
        // dd($semSelect,$deptSelect,$classSelect);
        $allStudent="SELECT rollNo,fname,lname FROM Student
        join users
        on Student.UID=users.id
        WHERE sem=$semSelect and class='$classSelect' and users.Dept='$deptSelect'";
         $allStudent=DB::select($allStudent);
        //  dd($allStudent);
         return view('attendanceForm',['semList'=>$semList,'allStudent'=>$allStudent]);

        
    }
}
