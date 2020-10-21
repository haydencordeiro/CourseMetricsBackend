<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class adminController extends Controller
{
    //
    public function adminHome(Request $request){
        $toApprove="SELECT * FROM `users` WHERE users.id NOT IN (SELECT Student.UID From Student) AND users.id NOT IN (SELECT Teacher.UID From Teacher);";
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
            dd($selectList);
        }


        return view('admin_confirm',['toApprove'=>$toApprove]);

    }
}
