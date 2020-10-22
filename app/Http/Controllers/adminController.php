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

                    
                    
                    
                }
                else{
                    $ApproveStudent="UPDATE users SET Verified = 1 WHERE id= $student->id ;";
                    $ApproveStudent=DB::statement($ApproveStudent);
                    
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
             0, '$pswd', NULL, NULL, NULL);";
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
}
