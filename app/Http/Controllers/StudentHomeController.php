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

        // Pie Chart (Graph 1)
        $graph1="SELECT *,Avg(Marks) mks FROM (select * from Marks as m JOIN Subject as s on(m.SubFk=s.SubjectName) join Exams as e on (e.id=m.ExamFk) WHERE m.SFK= 1) a group by ExamFk ";
        $graph1=DB::select($graph1);
        $graph1Labels=array();
        $graph1Marks=array();
        foreach($graph1 as $temp){
            // dd($temp);
            array_push($graph1Marks,$temp->mks);
            array_push($graph1Labels,$temp->Name);
        }
        // dd($graph1Marks);

        return view('studentHome',['UpcomingActivites'=>$UActivities,'AllSubjects'=>$AllSubjects,
        'graph1Labels'=>$graph1Labels,'graph1Marks'=>$graph1Marks]);
    }
    // NoOfLec
    // LectureNo

    public function StudentAttendance()
    {        
        $user = Auth::user();
        $id = Auth::id();
        $colors=array('#2ED8B6','lightpink','lightsalmon','#2ED8B6','lightpink','lightsalmon');
        
        $attendance="
        SELECT * FROM Enrolls as e
        JOIN Subject as s
        on(e.SubFk=s.SubjectName)
        join Student as st  
        on(e.SFK=st.UID)
        where e.SFK=$id and st.Sem=s.Sem";
        $attendance=DB::select($attendance);
        // dd($attendance);
        

        // return view('studentHome',['UpcomingActivites'=>$temp]);
        return view('studentAttendance',['attendance'=>$attendance,'colors'=>$colors]);
    }




    
}





// SELECT *,Avg(Marks) FROM Marks as m JOIN Subject as s on(m.SubFk=s.SubjectName) join Exams as e on (e.id=m.ExamFk) WHERE m.SFK= 1 GROUP by ExamFk



// SELECT * FROM Enrolls as e
// JOIN Subject as s
// on(e.SubFk=s.SubjectName)
// where e.SFK=1 and sem=1


// SELECT * FROM Enrolls as e
// JOIN Subject as s
// on(e.SubFk=s.SubjectName)
// join Student as st
// on(e.SFK=st.UID)
// where e.SFK=1 and st.Sem=s.Sem
