<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function __construct(){
        $this->middleware('guest',['only'=>'showLogin']);
    }

    public function showLoginForm(){
        if (Auth::check()) {
            return redirect()->to('dashboard');
        }else{
            return view('auth.login');
        }
    }


    public function login(){

        $credentials = $this->validate(request(), [
            'email'=>'required|email|string',
            'password'=>'required|string'
        ]);

        if(Auth::attempt($credentials)){
            $current_user = Usuario::where('email','=',$credentials['email'])->first();

           if($current_user->role == 'admin'){
                return redirect()->route('dashboard');
           }else if($current_user->role == 'cliente'){
                return redirect()->route('menu');
           }  
        }
        return back()->withErrors(['email'=>'Estas credenciales no concuerdan con nuestra Base de Datos'])
        ->withInput(request(['email']));
        
    }

    public function logout(){
        Auth::logout();
       return redirect()->route('menu');
    }
}
