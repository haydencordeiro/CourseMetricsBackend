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
        $subjectList="Select * from Subject where TFk=2;";
        $subjectList=DB::select($subjectList);


        
        return view('attendanceForm',['semList'=>$semList,'allStudent'=>array(),'subjectList'=>$subjectList]);
    }

    public function attendanceFormPost(Request $request){
        $user = Auth::user();
        $id = Auth::id();
        
        
        $checkWhich=$request->input('checkWhich');

        $semList="SELECT Distinct sem from Subject where TFk=$id;";
        $semList=DB::select($semList);
        $subjectList="Select * from Subject where TFk=2;";
        $subjectList=DB::select($subjectList);


        $semSelect=$request->input('semSelect');
        $deptSelect=$request->input('deptSelect');
        $classSelect=$request->input('classSelect');
        // dd($semSelect,$deptSelect,$classSelect);
        
        $allStudent="SELECT rollNo,fname,lname,UID FROM Student
        join users
        on Student.UID=users.id
        WHERE sem=$semSelect and class='$classSelect' and users.Dept='$deptSelect' order by rollNo";
         $allStudent=DB::select($allStudent);
        //  dd($allStudent);


        //second function here
        if($checkWhich=="Atten"){
            $ids=$request->input('studentIds');
            $ids =json_decode($ids, true);
            // dd($ids);
            $slot=$request->input('slotSelect');
            $date=$request->input('attDate');
            // dd($date);
            $subjSelect=$request->input('subjSelect');
            

            $selectList=array();
            foreach($ids as $id){
                
                array_push($selectList,$id);    
            }
    
            //taking all student and comparing with the ones required to be marked absent if no then present=1 else present=0

            $updateLectCount="UPDATE `Subject` SET `LectureNo` = `LectureNo`+1 WHERE `SubjectName` = '$subjSelect'";
            $updateLectCount=DB::statement($updateLectCount);

             foreach($allStudent as $student){

                    if (in_array($student->UID, $selectList))
                    {   
                        $temp="INSERT INTO `Attendance` (`Slot`, `SFK`, `SubFK`, `date`, `Present`) VALUES ($slot, $student->UID, '$subjSelect', '$date', '0');";
                        $temp=DB::statement($temp);
                        
                        
                        
                    }
                    else{
                        $updateLectCountStd="UPDATE Enrolls SET NoOfLec = NoOfLec+1 WHERE SFK= $student->UID and `SubFk` = '$subjSelect' ;";
                        $updateLectCountStd=DB::statement($updateLectCountStd);
                        $temp="INSERT INTO `Attendance` (`Slot`, `SFK`, `SubFK`, `date`, `Present`) VALUES ($slot, $student->UID, '$subjSelect', '$date', '1');";
                        $temp=DB::statement($temp);
                    }

             }
        }
         return view('attendanceForm',['semList'=>$semList,'allStudent'=>$allStudent,'subjectList'=>$subjectList]);

        
    }
    


}
