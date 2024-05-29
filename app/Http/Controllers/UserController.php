<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

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
            'name' => 'required|string|min:1',
            'sex' => 'required|string|min:1',
            'age' => 'required|string|min:1|max:99',
            'address' => 'required|string|min:1',
            'dateOfBirth' => 'required|date',
        ]);
    
        $existingUser = User::where('name', $request->input('name'))->first();
        if ($existingUser) {
            return response()->json([
                'error' => true,
                'message' => 'User with this name already exists.',
            ], 200);
        }
    
        $user = new User();
        $user->name = $request->input('name');
        $user->sex = $request->input('sex');
        $user->age = $request->input('age');
        $user->address = $request->input('address');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->save();
    
        return response()->json([
            'success' => true,
            'message' => 'User successfully created!',
            'user' => $user
        ], 200);
    }
    


    public function searchUser(Request $request)
    {
        $search = $request->input('searchInput');

        $users = User::where('name', 'LIKE', "%$search%")->get();

        if ($users->isEmpty()) {
            return response()->json([
                'error' => true,
                'message' => 'No users found'
            ], 200);
        } else {
            $html = view('ajax.tableWithUsers', ['users' => $users, 'searchInput' => $search])->render();
            return response()->json([
                'success' => true,
                'message' => 'Search results for ' . $search,
                'html' => $html
            ], 200);
        }
    }

    
    
}
