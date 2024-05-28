<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function addUserForm(){
        $users=User::all();
        return view('ajax/formForAjax', ['users' => $users]);
    }

    public function getUsers() {
        $users = User::all();
        return view('ajax/tableWithUsers', ['users' => $users]);
    }

    public function addUser(Request $request){
        $request->validate([
            'name' => 'required|string|min:1|unique:users',
            'sex' => 'required|string|min:1',
            'age' => 'required|string|min:1|max:99',
            'address' => 'required|string|min:1',
            'dateOfBirth' => 'required|date',
        ]);
    
        $user = new User();
        $user->name = $request->input('name');
        $user->sex = $request->input('sex');
        $user->age = $request->input('age');
        $user->address = $request->input('address');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->save();
    
    }

    public function searchUser(Request $request)
        {
            $search = $request->input('search');

            $users = User::where('name', 'LIKE', "%$search%")
                        ->orWhere('surname', 'LIKE', "%$search%")
                        ->get();

            return view('pages.friendsSearchResult', ['users' => $users, 'search' => $search]);
        }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/authPage');
    }
}
