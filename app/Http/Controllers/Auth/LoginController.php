<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo = '/';
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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        
        return 'SID';
    }
    protected function loggedOut(Request $request) {
        return redirect(route('login'));
    }

}
