<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserController extends Controller
{

    public function edit(){
        $user_id = auth()->user('id')->id;
        $user = User::find($user_id);
        return view('auth.change')->with('user', $user);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([

            "user_name" => "required",
            "user_email" => "required",

            "user_password" => "required",
            "user_confirm" => "required"

        ]);

        if($validatedData["user_password"] != $validatedData["user_confirm"]) {
            return redirect('/auth/change');
        }

        $hashed = Hash::make($validatedData['user_password']);

        $user = User::find($id);;
        $user->name = $validatedData['user_name'];
        $user->email = $validatedData['user_email'];
        $user->password = $hashed;

        $user->save();

        return redirect('/')->with('success', 'Info Changed');

    }
}
