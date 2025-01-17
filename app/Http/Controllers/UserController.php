<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){

        return view('users.index')->with('users',User::all());
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'admin made successfully');

        return redirct(route('users.index'));
    }

    public function edit(){

        return view('users.edit')->with('user',auth()->user());
    }


    public function update(UserUpdateRequest $request){

        $user= auth()->user();
        
        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);
        session()->flash('success', 'user update successfully');

        return redirect()->back();
    }
}
