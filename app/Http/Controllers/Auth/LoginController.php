<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
//  public function redirectTo(){
//         if(auth()->user()->isap()) {
//         return '/admin';
//         } else {
//         return '/register';
//         }
//     }
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        $user_data = array(
            'email' => $request->get('username'),
            'password' => $request->get('password')
        ); 
        if(Auth::attempt($user_data)){
            $user_role = Auth::user()->role;
            echo($user_role);
            if($user_role == 'admin'){
                return redirect('/home');
            } 
            if($user_role == 'student'){
                $user_id = Auth::user()->id; 
                return redirect("/student/".$user_id);
            }
        }else{
            return redirect("/");
        }

    }

    public function logout(){
        Auth::logout();
        return redirect("/");
    }
}
