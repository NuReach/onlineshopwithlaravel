<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function loginAction(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))->with("sucMsg","log in successfully");
        }
        return redirect(route('login'))->with("error","log in detailed is not valid");
    }
    public function signup(){
        return view('pages.signup');
    }
    public function signupAction(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $data['name'] =$request->name;
        $data['email'] =$request->email;
        $data['password'] =$request->password;
        $user = User::create($data);
        if (!$user) {
            return redirect(route('signup'))->with("error","Sign up detailed is not valid");
        }
        return redirect(route('login'))->with("sucMsg","Register successfully");
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
