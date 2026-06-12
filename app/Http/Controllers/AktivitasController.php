<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AktivitasController extends Controller
{
    public function index()
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->join('program_mbkm', 'aktivitas_mbkm.program_id', '=', 'program_mbkm.id')
            ->where('user_id', session('user_id'))
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
        DB::table('aktivitas_mbkm')->insert([
            'user_id' => session('user_id'),
            'program_id' => $request->program_id,
            'status_program' => 'Berlangsung',
            'learning_path' => $request->learning_path,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/aktivitas');
    }

    public function createProgress($id)
    {
        return view('mahasiswa.tambah_progress', [
            'aktivitas_id' => $id
        ]);
    }

    public function storeProgress(Request $request)
    {
        DB::table('progress_mbkm')->insert([
            'aktivitas_id' => $request->aktivitas_id,
            'bulan' => $request->bulan,
            'progress' => $request->progress,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/aktivitas');
    }
}