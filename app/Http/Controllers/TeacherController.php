<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class TeacherController extends Controller
{
    public function home(Request $request){
       
        

        $subjectList="Select Distinct * from Subject";
        $subjectList=DB::select($subjectList);
        $examList="select distinct * from Exams;";
        $examList=DB::select($examList);

        //temp variables incase first get request
        $toppersList=array();
        $lowScoreList=array();
        $marksDistribution=array();
        $attendanceMax=array();
        $attendanceMin=array();
        

        if( $request->isMethod('post'))
        {
            $semSelect=$request->input('semSelect');
            $deptSelect=$request->input('deptSelect');
            $classSelect=$request->input('classSelect');
            $subjSelect=$request->input('subjSelect');
            $examSelect=$request->input('examSelect');
            
            //data from db
            $attendanceMax="SELECT users.fname, users.lname FROM Enrolls JOIN users JOIN Subject
             WHERE Enrolls.SFK=users.id AND Enrolls.SubFk='$subjSelect' AND Subject.SubjectName='$subjSelect'
            ORDER BY (Enrolls.NoOfLec/ Subject.LectureNo) DESC LIMIT 5";
            $attendanceMax=DB::select($attendanceMax);
            $attendanceMin="SELECT users.fname, users.lname FROM Enrolls JOIN users JOIN Subject
            WHERE Enrolls.SFK=users.id AND Enrolls.SubFk='$subjSelect' AND Subject.SubjectName='$subjSelect'
           ORDER BY (Enrolls.NoOfLec/ Subject.LectureNo)  LIMIT 5";
           $attendanceMin=DB::select($attendanceMin);
            $toppersList="SELECT users.fname, users.lname FROM Marks join Exams on( Marks.ExamFk=Exams.id) JOIN users
             WHERE Marks.SFK=users.id AND SubFk='$subjSelect' AND Exams.Name='$examSelect' 
             AND Marks.SFK IN (SELECT Student.UID FROM Student WHERE CLASS='$classSelect') ORDER BY Marks.Marks DESC LIMIT 5";
            $toppersList=DB::select($toppersList);
            $lowScoreList="SELECT users.fname, users.lname FROM Marks join Exams on( Marks.ExamFk=Exams.id) JOIN users
            WHERE Marks.SFK=users.id AND SubFk='$subjSelect' AND Exams.Name='$examSelect' 
            AND Marks.SFK IN (SELECT Student.UID FROM Student WHERE CLASS='$classSelect') ORDER BY Marks.Marks  LIMIT 5";
           $lowScoreList=DB::select($lowScoreList);
           $marksDistribution='SELECT MAX(Marks) max,Round(AVG(Marks)) avg ,Min(Marks) min FROM Marks where Marks.SubFk="coa" AND Marks.ExamFk="3"';
           $marksDistribution=DB::select($marksDistribution);
            
            // dd($marksDistribution);
        // dd($semSelect,$deptSelect,$classSelect,$subjSelect,$examSelect);


        }

        return view('teacherHome',['subjectList'=>$subjectList,'examList'=>$examList,'toppersList'=>$toppersList,
        'lowScoreList'=>$lowScoreList,'marksDistribution'=>$marksDistribution,
        'attendanceMax'=>$attendanceMax,'attendanceMin'=>$attendanceMin]);

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
