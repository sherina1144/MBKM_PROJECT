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

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = DB::table('users')
            ->where('id', session('user_id'))
            ->first();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ];

        $hasFile = $request->hasFile('foto');

        if (
            $user->name == $request->name &&
            $user->email == $request->email &&
            !$hasFile
        ) {
            return back()->with(
                'error',
                'Mohon tentukan perubahan'
            );
        }

        if ($hasFile) {

            $namaFoto = time() . '.' .
                $request->file('foto')->extension();

            $request->file('foto')->move(
                public_path('foto'),
                $namaFoto
            );

            $data['foto'] = $namaFoto;
        }

        DB::table('users')
            ->where('id', session('user_id'))
            ->update($data);

        session([
            'name' => $request->name,
            'foto' => $data['foto'] ?? $user->foto
        ]);

        return back()->with(
            'success',
            'Profil berhasil diperbarui'
        );
    }
}