<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
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
}
