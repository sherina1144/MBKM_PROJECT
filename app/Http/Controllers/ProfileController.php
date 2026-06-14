<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->where('id', session('user_id'))
            ->first();

        return view('mahasiswa.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $foto = null;

        if($request->hasFile('foto')){

            $foto = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('profile'),
                $foto
            );

            DB::table('users')
                ->where('id', session('user_id'))
                ->update([
                    'foto' => $foto,
                    'updated_at' => now()
                ]);
        }

        DB::table('users')
            ->where('id', session('user_id'))
            ->update([

                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => now()

            ]);

        session([
            'name' => $request->name
        ]);

        return redirect('/profile');
    }
}