<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function authPage(){
        return view('authForm');
    }

    public function regPage(){
        return view('registerForm');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $userID = Auth::id();
            $user = User::find($userID);
            return view('resultLogin', ['userID' => $userID, 'name' => $user->name]);
        }
        else{
            return back();
        }
    }


    public function register(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return back();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->password = $request->input('password'); 
        $user->email = $request->input('email');
        $user->save();

        Auth::login($user);
        return view('authForm');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/authPage');
    }
}
