<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        $verifiedNo="Select Verified from users where id=$id";
        $verifiedNo=DB::select($verifiedNo);
        // dd($teacher[0]->c);
        if($verifiedNo[0]->Verified==2){
            return redirect()->route('teacherHome');

        }
        else if($verifiedNo[0]->Verified==3){
            return redirect()->route('adminHome');

}
        else if($verifiedNo[0]->Verified==4){
            return redirect()->route('studentChapterHome');

           

        }
        else{
            return redirect()->route('studentHome');

        }
        // return view('home');
    }
    protected function redirectTo()
    {
        $user = Auth::user();
        $id = Auth::id();
        $teacher="SELECT count(*) c FROM `Teacher` 
        WHERE Uid=$id";
        $teacher=DB::select($teacher);
        // dd($teacher[0]->c);
        if($teacher[0]->c!=0){
            return '/teacher';
        }
        else{

            return '/student';
        }

    }
}
