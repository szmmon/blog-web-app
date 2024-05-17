<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserAccountController extends Controller
{

    public function index(){
        return inertia('UserAccount/Index',
        ['users' => User::all()]);
    }

    public function edit(User $user_account){
        return inertia('UserAccount/Edit',
        ['user' => $user_account]
        );
    }
    public function update(Request $request, User $user_account){
        $user_account->update(
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ])
        );
        return redirect()->route('user-account.index')->with('success', 'Account edited');
    }

    public function destroy(User $user_account)
    {
        $user_account->deleteOrFail();
        
        return redirect()->back()->with('success', 'User was deleted');
    }


    public function create(){
        return inertia('UserAccount/Create');
    }
    public function store(Request $request){
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]));
        Auth::login($user);

        return redirect()->route('index')->with('success', 'Account created');
    }
}
