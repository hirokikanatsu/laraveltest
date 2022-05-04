<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\EmailRequest;
use App\Notifications\PasswordResetUserNotification;

class AuthController extends Controller{

    public function __construct()
    {
        $this->User = new User;    
    }

    public function login_form(){
        return view('login_form');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }
        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function signup_form(){
        return view('signup_form');
    }

    public function signup(Request $request){
        $this->User->createUser($request);

        return redirect()->route('login_form');
    }
    
}