<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function login_action(Request $request){
        return view('auth.login');
    }

    public function register_action(Request $request){
        $valid = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $valid['name'],
                'email' => $valid['email'],
                'password' => Hash::make($valid['password'])
            ]);
            // event(new Registered($user));
            auth()->login($user);
            return redirect(route('user.dashboard'))->with('message', 'Register Success');
        } catch (\Throwable $th) {
            return back()->with('error', 'Some Errors, please try again');
        }

    }
}
