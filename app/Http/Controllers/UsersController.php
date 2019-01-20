<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller


{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {

        if(auth()->user()->access_lv == 3){

        } else {
            return redirect('/')->with('error', 'Unauthorized Page');

        }

        $users = User::all();
        return view('pages.users')->with('users', $users);

    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([

            "access_lv" => "required",
            "user_id" => "required"
        ]);


        $user = User::find($validatedData{'user_id'});;
        $user->access_lv = $validatedData['access_lv'];

        $user->save();

        return redirect('/')->with('success', 'Access Changed');

    }
}
