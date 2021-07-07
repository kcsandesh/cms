<?php

namespace App\Http\Controllers;

use App\User;


use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateUsersRequest;

class UsersController extends Controller

{


    public function index()
    {
        return view('users.index')->with('users', User::simplePaginate(2));
    }

    public function edit()
    {
    return view('users.edit')->with('user',auth()->user());
    }
    public function update(UpdateUsersRequest $request )
    {
        $user=auth()->user();



          $user=update([
             'name'=>$request->name,
             'name'=>$request->name,
            ]);



        session()->flash('success', 'Profile updated successfullly.');
        return redirect()->back();
    }
    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();
        session()->flash('success', 'New Admin is crearted.');
        return redirect(route('users.index'));
    }

}
