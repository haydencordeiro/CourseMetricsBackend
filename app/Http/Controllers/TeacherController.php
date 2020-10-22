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

        //temp variables incase first get request so then there is no error in the return 
        $toppersList=array(); 
        $lowScoreList=array();
        $marksDistribution=array();
        $attendanceDistribution=array();
        $attendanceMax=array();
        $attendanceMin=array();
        $MarksGraph=array();
        $AttendanceGraph=array();


        if( $request->isMethod('post'))
        {
            $semSelect=$request->input('semSelect');
            $deptSelect=$request->input('deptSelect');
            $classSelect=$request->input('classSelect');
            $subjSelect=$request->input('subjSelect');
            $examSelect=$request->input('examSelect');
            


            //marks graph
            $MarksGraph1="SELECT COUNT(SFK) m FROM Marks JOIN Exams WHERE Marks.ExamFk=(SELECT Exams.id 
            FROM Exams WHERE Exams.Name='$examSelect') AND Marks.SubFk='$subjSelect' AND Marks.Marks BETWEEN 0 AND 8";
            $MarksGraph2="SELECT COUNT(SFK) m FROM Marks JOIN Exams WHERE Marks.ExamFk=(SELECT Exams.id 
            FROM Exams WHERE Exams.Name='$examSelect') AND Marks.SubFk='$subjSelect' AND Marks.Marks BETWEEN 9 AND 12";
            $MarksGraph3="SELECT COUNT(SFK) m FROM Marks JOIN Exams WHERE Marks.ExamFk=(SELECT Exams.id 
            FROM Exams WHERE Exams.Name='$examSelect') AND Marks.SubFk='$subjSelect' AND Marks.Marks BETWEEN 13 AND 17";
            $MarksGraph4="SELECT COUNT(SFK) m FROM Marks JOIN Exams WHERE Marks.ExamFk=(SELECT Exams.id
            FROM Exams WHERE Exams.Name='$examSelect') AND Marks.SubFk='$subjSelect' AND Marks.Marks BETWEEN 18 AND 20";
            

            $MarksGraph1=DB::select($MarksGraph1)[0]->m;
            $MarksGraph2=DB::select($MarksGraph2)[0]->m;
            $MarksGraph3=DB::select($MarksGraph3)[0]->m;
            $MarksGraph4=DB::select($MarksGraph4)[0]->m;
            $MarksGraph=array($MarksGraph1,$MarksGraph2,$MarksGraph3,$MarksGraph4);
            // dd($MarksGraph)

            // //attendance graph
            // $AttendanceGraph1='';
            // $AttendanceGraph2='';
            // $AttendanceGraph3='';
            // $AttendanceGraph4='';
            // $AttendanceGraph1=DB::select($AttendanceGraph1)[0]->m;
            // $AttendanceGraph2=DB::select($AttendanceGraph2)[0]->m;
            // $AttendanceGraph3=DB::select($AttendanceGraph3)[0]->m;
            // $AttendanceGraph4=DB::select($AttendanceGraph4)[0]->m;
            // $AttendanceGraph=array($AttendanceGraph1,$AttendanceGraph2,$AttendanceGraph3,$AttendanceGraph4);


            //getting data from the db
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
           $attendanceDistribution="SELECT Round(MAX(Enrolls.NoOfLec*100/ Subject.LectureNo)) max ,Round(MIN(Enrolls.NoOfLec*100/ Subject.LectureNo)) min,Round(AVG(Enrolls.NoOfLec*100/ Subject.LectureNo)) avg FROM Enrolls JOIN Subject where Enrolls.SubFK='$subjSelect' and Subject.SubjectName='$subjSelect'";
           $attendanceDistribution=DB::select($attendanceDistribution);
           $marksDistribution='SELECT MAX(Marks) max,Round(AVG(Marks)) avg ,Min(Marks) min FROM Marks where Marks.SubFk="coa" AND Marks.ExamFk="3"';
           $marksDistribution=DB::select($marksDistribution);
            
            // dd($attendanceDistribution,$attendanceMax);
        // dd($semSelect,$deptSelect,$classSelect,$subjSelect,$examSelect);


        }

        return view('teacherHome',['subjectList'=>$subjectList,'examList'=>$examList,'toppersList'=>$toppersList,
        'lowScoreList'=>$lowScoreList,'marksDistribution'=>$marksDistribution,
        'attendanceMax'=>$attendanceMax,'attendanceMin'=>$attendanceMin,'attendanceDistribution'=>$attendanceDistribution,
        'AttendanceGraph'=>$AttendanceGraph,'MarksGraph'=>$MarksGraph]);

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
