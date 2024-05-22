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
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return view('resultLogin', ['userID' => $user->id, 'name' => $user->name]);
        } else {
            return back();
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:1',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return back()->with('error', 'Email уже зарегистрирован.');
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->password = $request->input('password'); 
        $user->email = $request->input('email');
        $user->save();

        return view('authForm');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/authPage');
    }
}
