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
        $teacher="SELECT count(*) c FROM `Teacher` 
        WHERE Uid=$id";
        $teacher=DB::select($teacher);
        // dd($teacher);
        if($teacher[0]->c!=0){
            return '/teacher';
        }
        else{

            return '/student';
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
