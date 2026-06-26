<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AktivitasController extends Controller
{
    public function index()
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->join(
                'program_mbkm',
                'aktivitas_mbkm.program_id',
                '=',
                'program_mbkm.id'
            )
            ->where('aktivitas_mbkm.user_id', session('user_id'))
            ->select(
                'aktivitas_mbkm.*',
                'program_mbkm.nama_program'
            )
            ->first();

        $progress = [];

        if ($aktivitas) {

            $progress = DB::table('progress_mbkm')
                ->where('aktivitas_id', $aktivitas->id)
                ->get();
        }

        return view('mahasiswa.aktivitas', compact(
            'aktivitas',
            'progress'
        ));
    }

    public function create()
    {
        $program = DB::table('program_mbkm')->get();

        return view('mahasiswa.tambah_program', compact('program'));
    }
    public function store(Request $request)
    {
        $request->validate([

            'program_id' => 'required',
            'status_program' => 'required',
            'learning_path' => 'required'

        ]);

        DB::table('aktivitas_mbkm')->insert([

            'user_id' => session('user_id'),
            'program_id' => $request->program_id,
            'status_program' => $request->status_program,
            'learning_path' => $request->learning_path,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        return redirect('/aktivitas');
    }

    public function edit($id)
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->where('id', $id)
            ->first();

        $program = DB::table('program_mbkm')->get();

        return view(
            'mahasiswa.edit_program',
            compact(
                'aktivitas',
                'program'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'program_id' => 'required',
            'status_program' => 'required',
            'learning_path' => 'required'

        ]);

        DB::table('aktivitas_mbkm')
            ->where('id', $id)
            ->update([

                'program_id' => $request->program_id,
                'status_program' => $request->status_program,
                'learning_path' => $request->learning_path,
                'updated_at' => now()

            ]);

        return redirect('/aktivitas');
    }


}