<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $googleUser = Socialite::driver('google')->user();
 
        $user = User::updateOrCreate([
            'email' => $googleUser->email,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'token' => $googleUser->token,
            'refresh_token' => $googleUser->refreshToken,
            'password' => 0
        ]);
    
        Auth::login($user);
    
        return redirect()->route('user.dashboard');
    }
}
