<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Cache;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;
class StudentHomeController extends Controller
{
    
    public function home()
    {
        
        $user = Auth::user();
        $id = Auth::id();
        // Upcoming events

        $toppersList=Cache::get( 'studentHome.toppersList' );
        $UActivities=Cache::remember('studentHome.UActivities',300, function()  {

            $UActivities="select * from upcomingevents  join users on (users.id=upcomingevents.UFK) where Date  >= DATE(NOW())";
            $UActivities=DB::select($UActivities);
            return $UActivities;
         });
        // $UActivities=Cache::get( 'studentHome.UActivities' );
        // $UActivities="select * from upcomingevents  join users on (users.id=upcomingevents.UFK) where Date  >= DATE(NOW())";
        // $UActivities=DB::select($UActivities);
        // Marks Table
        // $AllSubjects="SELECT * from (SELECT * FROM Marks as m
        // JOIN Subject as s
        // on(m.SubFk=s.SubjectName)
        // join Exams as e
        // on (e.id=m.ExamFk)
        // WHERE m.SFK= $id ) allrows
        // where sem=(SELECT MAX(sem) FROM Marks as m
        // JOIN Subject as s
        // on(m.SubFk=s.SubjectName)
        // WHERE m.SFK= $id )";
        // $AllSubjects=DB::select($AllSubjects);
        // dd($AllSubjects);
        $AllSubjects=Cache::remember('studentHome.AllSubjects',300, function() use($id) {
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
            return $AllSubjects;
         });
        $AllSubjects=Cache::get('studentHome.AllSubjects' );

        // Pie Chart (Graph 1)
        $graph1= Cache::remember('studentHome.graph1',300, function() use($id) {
            $graph1="SELECT *,Avg(Marks) mks FROM (select * from Marks as m JOIN Subject as s on(m.SubFk=s.SubjectName)
            join Exams as e on (e.id=m.ExamFk) WHERE m.SFK= $id) a group by ExamFk ";
           $graph1=DB::select($graph1);
            return $graph1;
         });
        // $graph1=Cache::get('studentHome.graph1' );
        // $graph1="SELECT *,Avg(Marks) mks FROM (select * from Marks as m JOIN Subject as s on(m.SubFk=s.SubjectName)
        //  join Exams as e on (e.id=m.ExamFk) WHERE m.SFK= $id) a group by ExamFk ";
        // $graph1=DB::select($graph1);
        $graph1Labels=array();
        $graph1Marks=array();
        foreach($graph1 as $temp){
            // dd($temp);
            array_push($graph1Marks,$temp->mks);
            array_push($graph1Labels,$temp->Name);
        }
        // dd($graph1Marks);

        

        // Line Graph;

        $finalLineGraphtemp=Cache::remember('studentHome.linegraph2',5, function() use($id) {
            $line1=array();
            $line2=array();
            $lineGraph="SELECT Count(*) cnt, Month(date) mon,SubFk c FROM `Attendance` WHERE Present=1 and SFK=$id GROUP by Month(date),SubFK;";
            $lineGraph=DB::select($lineGraph);
            // dd($lineGraph);
    
            $tempArray=array('coa','am-2');
            $tempArray2=array();
            $months=array();
            foreach($lineGraph as $subject ){
    
                $tempArray2[$subject->c]=array();
    
                }
                foreach($lineGraph as $subject ){
    
                    array_push($tempArray2[$subject->c],$subject->cnt);
                    array_push($months,$subject->mon);
                    
                }
                $months=array_unique($months);
                
                $max=0;
                foreach($tempArray2 as $sub){
                    $max=$max>(count($sub))?$max:(count($sub));
                }
                foreach($tempArray2 as $i=>$sub){
    
                    $tempArray2[$i]=(array_pad($sub,-$max,0));
                    
                }
                return array($months,$tempArray2);
         });
        // $finalLineGraphtemp=Cache::get('studentHome.linegraph2' );
        // $line1=array();
        // $line2=array();
        // $lineGraph="SELECT Count(*) cnt, Month(date) mon,SubFk c FROM `Attendance` WHERE Present=1 GROUP by Month(date),SubFK;";
        // $lineGraph=DB::select($lineGraph);
        // // dd($lineGraph);

        // $tempArray=array('coa','am-2');
        // $tempArray2=array();
        // $months=array();
        // foreach($lineGraph as $subject ){

        //     $tempArray2[$subject->c]=array();

        //     }
        //     foreach($lineGraph as $subject ){

        //         array_push($tempArray2[$subject->c],$subject->cnt);
        //         array_push($months,$subject->mon);
                
        //     }
        //     $months=array_unique($months);
            
        //     $max=0;
        //     foreach($tempArray2 as $sub){
        //         $max=$max>(count($sub))?$max:(count($sub));
        //     }
        //     foreach($tempArray2 as $i=>$sub){

        //         $tempArray2[$i]=(array_pad($sub,-$max,0));
                
        //     }
            // dd($lineGraph,$tempArray2,$months);
            $finalLineGraph=$finalLineGraphtemp[1];
            $finalLineGraphLabel=$finalLineGraphtemp[0];
            // dd($finalLineGraph);

  
        
// SELECT SubjectName FROM Subject WHERE Sem=(SELECT Student.Sem FROM Student WHERE UID=1)
        return view('studentHome',['UpcomingActivites'=>$UActivities,'AllSubjects'=>$AllSubjects,
        'graph1Labels'=>$graph1Labels,'graph1Marks'=>$graph1Marks,
        'finalLineGraph'=>$finalLineGraph,'finalLineGraphLabel'=>$finalLineGraphLabel]);
    }
    // NoOfLec
    // LectureNo

    public function StudentAttendance()
    {        
        $user = Auth::user();
        $id = Auth::id();
        $colors=array('#2ED8B6','lightpink','lightsalmon','#2ED8B6','lightpink','lightsalmon');
        // attendance progress bar
        $attendance="
        SELECT * FROM Enrolls as e
        JOIN Subject as s
        on(e.SubFk=s.SubjectName)
        join Student as st  
        on(e.SFK=st.UID)
        where e.SFK=$id and st.Sem=s.Sem";
        $attendance=DB::select($attendance);
        // dd($attendance);
        

        // attendance table
        $attendanceDates="SELECT DISTINCT date  FROM `Attendance` 
        WHERE SFK=$id
        order by date desc;";
        $attendanceDates=DB::select($attendanceDates);
        // dd($attendanceDates);
        $attendanceTable=array();
        
        foreach($attendanceDates as $index=>$date){
            $temp=array($date);
            $tempQuery="SELECT  Slot,SubFK,Present  FROM Attendance 
            WHERE SFK=$id and date='$date->date'
             order by date desc";
            $tempQuery=DB::select($tempQuery);
            foreach($tempQuery as $tq){

                array_push($temp,$tq);
            }          
            array_push($attendanceTable,$temp);

        }
        // dd($attendanceTable);
        

        // return view('studentHome',['UpcomingActivites'=>$temp]);
        return view('studentAttendance',['attendance'=>$attendance,'colors'=>$colors,'attendanceTable'=>$attendanceTable]);
    }


    
}









// select *,EXTRACT(month from date)
// from Attendance
// group by EXTRACT(month from date)


// SELECT * FROM Attendance WHERE 1
// order by SubFK

// SELECT * from Attendance a
// join Subject s
// on a.SubFK=s.SubjectName
// join users u
// on u.id=a.SFK








// SELECT DISTINCT SubFK from Attendance a
// join Subject s
// on a.SubFK=s.SubjectName 
// where sem=(
    
    
//     SELECT Max(Sem) from Attendance a
// join Subject s
// on a.SubFK=s.SubjectName
// )