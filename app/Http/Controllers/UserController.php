<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Index(){
        $user = User::all();

        return view("user", compact('user'));
    }

    public function Store(Request $request){
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->level = $request->input('level');

        $user->save();

        return redirect()->back()->with('success', 'Data berhasil ditambah.');
    }
}
