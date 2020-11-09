<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use DB;
class StudentChapter extends Controller
{
    //
    public function studentChapterHome(Request $request){
        $id = Auth::id();
        $allEvents="SELECT * FROM upcomingevents JOIN users on(users.id=upcomingevents.UFK)
        where UFK=$id;";
        $allEvents=DB::select($allEvents);
    // dd($allEvents);
        if($request->isMethod('post')){
            $title=$request->input('title');
            $price=$request->input('price');
            $link=$request->input('link');
            $date=$request->input('date');
            $insertData="INSERT INTO `upcomingevents` (`id`, `Price`, `Description`, `Date`, `Link`, `UFK`) 
            VALUES (NULL,  $price,'$title', '$date', '$link', $id);";
            $insertData=DB::statement($insertData);
            $allEvents="SELECT * FROM upcomingevents JOIN users on(users.id=upcomingevents.UFK)
            where UFK=$id;";
            $allEvents=DB::select($allEvents);

        }

            return view('AddEvent',['allEvents'=>$allEvents]);


    }

}
