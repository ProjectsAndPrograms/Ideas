<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(){

        return view('auth.register');
    }
    public function store(){

        // validate
        // create the user
        // redirect

        $validated = request()->validate(
            [
                'name' => 'required|max:40', 
                'email' => 'required|email|unique:users,email', 
                'password' => 'required|confirmed|min:8'
            ]
        );

       $user = User::create(
            [
                'name' => $validated['name'], 
                'email' => $validated['email'], 
                'password' => Hash::make($validated['password'])
            ]
        );

        //Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success', 'Account created successfully !');

    }

    public function login(){

        return view('auth.login');
    }
    public function authenticate(){

        // validate
        // create the user
        // redirect

        $validated = request()->validate(
            [
                'email' => 'required|email', 
                'password' => 'required|min:8'
            ]
        );

        if(auth()->attempt($validated)){
            request()->session()->regenerate();  // to regenerate previous sessions
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');

        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with the provided email and password!'
        ]);

    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully!');
    }
}
