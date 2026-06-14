<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function index()
    {
        $program = DB::table('program_mbkm')->get();

        return view(
            'admin.informasi_mbkm',
            compact('program')
        );
    }

    public function create()
    {
        return view('admin.tambah_program_mbkm');
    }

    public function store(Request $request)
    {
        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('program'),
                $foto
            );
        }

        DB::table('program_mbkm')->insert([

            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'link_pendaftaran' => $request->link_pendaftaran,
            'foto' => $foto,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        return redirect('/informasi-mbkm');
    }

    public function delete($id)
    {
        DB::table('program_mbkm')
            ->where('id', $id)
            ->delete();

        return redirect('/informasi-mbkm');
    }

    public function detail($id)
    {
        $program = DB::table('program_mbkm')
            ->where('id', $id)
            ->first();

        return view(
            'admin.detail_program',
            compact('program')
        );
    }
}