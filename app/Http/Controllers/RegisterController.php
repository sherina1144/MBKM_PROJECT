<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',

            'email'=>'required|email|unique:users,email',

            'password'=>'required|min:4',

            'role'=>'required'

        ]);

        DB::table('users')->insert([

            'name'=>$request->name,

            'email'=>$request->email,

            'password'=>$request->password,

            'role'=>$request->role,

            'created_at'=>now(),

            'updated_at'=>now()

        ]);

        return redirect('/login')
            ->with('success','Registrasi berhasil.');
    }
}