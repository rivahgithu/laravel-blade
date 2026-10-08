<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showSignUp() {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function showFormLogin() {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request){
           $request->validate([
             'email' => 'required|string|email',
            'password' => 'required|string'
           ]);

           if(Auth::attempt($request->only("email", "password"))){
            return redirect()->intended('dashboard');
           }

           return back()->withErrors(["email" => "Les informations fournies ne correspondent pas !"]);
    }

    public function signUp(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

             $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Mail::to($user->email)->send(new WelcomeMail($user));
        return back()->with('success', "inscription réussie ! un e-mail de bienvenue a été envoyé");
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
