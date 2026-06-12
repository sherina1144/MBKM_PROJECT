<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if(!$user){

            return redirect('/login')
                ->with('error','Email atau Password Salah');

        }

        session([
            'user_id' => $user->id,
            'name' => $user->name,
            'role' => $user->role
        ]);

        if($user->role == 'admin'){

            return redirect('/admin');

        }

        if($user->role == 'dosen'){

            return redirect('/dosen');

        }

        return redirect('/mahasiswa');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}