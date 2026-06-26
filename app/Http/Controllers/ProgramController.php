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
        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(
                public_path('images'),
                $gambar
            );
        }

        DB::table('program_mbkm')->insert([

            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'link_daftar' => $request->link_daftar,
            'gambar' => $gambar,
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

    public function update(Request $request, $id)
    {
        $data = [

            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'link_daftar' => $request->link_daftar,
            'updated_at' => now()

        ];

        if ($request->hasFile('gambar')) {

            $gambar = time() . '.' . $request->gambar->extension();

            $request->gambar->move(
                public_path('images'),
                $gambar
            );

            $data['gambar'] = $gambar;
        }

        DB::table('program_mbkm')
            ->where('id', $id)
            ->update($data);    

        return redirect('/informasi-mbkm');
    }
}