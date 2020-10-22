<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
class CustomRegister extends Controller
{
    //

    public function CustomRegister(Request $request){
        if($request->isMethod('post')){
            $fname=$request->input('fname');
            $lname=$request->input('lname');
            $StudentID=$request->input('StudentID');
            $phoneNo=$request->input('honeNo');
           $DOB=$request->input('DOB');
            $year=$request->input('year');
            $email=$request->input('email');
            $pswd=Hash::make($request->input('pswd'));
            $classSelect=$request->input('classSelect');
            $sem=$request->input('sem');
            $rollNo=$request->input('rollNo');
            $insertUser="INSERT INTO `users` 
            (`id`, `fname`, `lname`, `SID`, `phoneno`, `birth_date`, `year`, `email`, `Verified`, `password`, `remember_token`, `created_at`, `updated_at`, `Dept`) 
            VALUES (NULL, '$fname', '$lname', '$StudentID', '$phoneNo',
             '$DOB', '$year', '$email', 
             0, '$pswd', NULL, NULL, NULL, 'Comps');";
            //  dd);
             $insertUser=DB::select($insertUser);
             $user="SELECT id FROM `users` WHERE SID='$StudentID'";
             $user=DB::select($user);
             $user=$user[0]->id;
            //  dd($user[0]->id);
             $insertStudent="INSERT INTO `Student` (`UID`, `Sem`, `rollNo`, `Class`) VALUES ('$user', $sem, $rollNo, '$classSelect');";
             $insertStudent=DB::select($insertStudent);
            //   dd($insertStudent);


            return  Redirect::route('studentHome');
            
        }
        else{
            return view('register');
        }
    }
}
