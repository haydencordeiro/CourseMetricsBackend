<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Http\Request;


class adminController extends Controller
{
    //
    public function adminHome(Request $request){
        $toApprove="SELECT * FROM `users` WHERE Verified=0";
        $toApprove=DB::select($toApprove);
        // dd($toApprove);
        $checkWhich=$request->input('checkWhich');
        if($request->isMethod('post') && $checkWhich=="removeSelected"){
            $ids=$request->input('studentIds');
            $ids =json_decode($ids, true);
            $selectList=array();
            foreach($ids as $id){
                
                array_push($selectList,$id);    
            }
            // dd($toApprove);

            foreach($toApprove as $student){

                if (in_array($student->id, $selectList))
                {   

                    
                    
                    $ApproveStudent="UPDATE users SET Verified = 1 WHERE id= $student->id ;";
                    $ApproveStudent=DB::statement($ApproveStudent);
                    
                }
                else{
                    
                }

         }
         $toApprove="SELECT * FROM `users` WHERE Verified=0";
         $toApprove=DB::select($toApprove);
        }


        return view('admin_confirm',['toApprove'=>$toApprove]);

    }
    public function AddTeacher(Request $request){
        

        if($request->isMethod('post')){
            $fname=$request->input('fname');
            $lname=$request->input('lname');
            $StudentID=$request->input('StudentID');
            $phoneNo=$request->input('phoneNo');
           $DOB=$request->input('DOB');
            $dept=$request->input('dept');
            $email=$request->input('email');
            $pswd=Hash::make($request->input('pswd'));



            $insertUser="INSERT INTO `users` 
            (`id`, `fname`, `lname`, `SID`, `phoneno`, `birth_date`, `email`, `Verified`, `password`, `remember_token`, `created_at`, `updated_at`) 
            VALUES (NULL, '$fname', '$lname', '$StudentID', '$phoneNo',
             '$DOB', '$email', 
             2, '$pswd', NULL, NULL, NULL);";
            //  dd);
             $insertUser=DB::select($insertUser);
             $user="SELECT id FROM `users` WHERE SID='$StudentID'";
             $user=DB::select($user);
             $user=$user[0]->id;

             $insertTeacher="INSERT INTO `Teacher` (`UID`,`DFK`) VALUES ('$user','$dept');";
             $insertTeacher=DB::select($insertTeacher);
            //   dd($insertStudent);


            
            
        }
        
            return view('add_teacher');

    }
    public function Subject(Request $request){
        $teachers="select fname,lname,uid from Teacher join users on (Teacher.UID=users.id)";
        $teachers=DB::select($teachers);
        $SubjectNames="select fname,lname,CID,SubjectName from Subject join users on (Subject.TFk=users.id)";
        $SubjectNames=DB::select($SubjectNames);
        // dd($SubjectNames);

        if($request->isMethod('post')){
            $SubjectName=$request->input('sName');
            $CID=$request->input('courseID');
            $Tfk=$request->input('tfk');
            $sem=$request->input('sem');
            $insertSubject="INSERT INTO `Subject` (SubjectName, CID, TFk, LectureNo,Sem) VALUES ('$SubjectName', '$CID', $Tfk, 0 , $sem)";
            $insertSubject=DB::select($insertSubject);
        }

        return view('AdminSubject',['teachers'=>$teachers,'SubjectNames'=>$SubjectNames]);
    }

    public function DelSubject(Request $request,$id){
        $deleteSubject="DELETE FROM `Subject` WHERE `Subject`.`CID` = $id";
        $deleteSubject=DB::statement($deleteSubject);
        return redirect('/adminSubject');
    }
}
