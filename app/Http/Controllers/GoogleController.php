<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function googlepage(){

        return socialite::driver('google')->redirect();
    }

    public function googlecallback(){

        try{
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            }
            else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123'),
                ]);
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch(Exception $e){
            dd($e->getMessage());
        }
        
        
    }
}
 