<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $totalMahasiswa = DB::table('users')
            ->where('role', 'mahasiswa')
            ->count();

        $totalAktivitas = DB::table('aktivitas_mbkm')
            ->count();

        $totalProgress = DB::table('progress_mbkm')
            ->count();

        $data = DB::table('aktivitas_mbkm')
            ->join('users', 'aktivitas_mbkm.user_id', '=', 'users.id')
            ->join('program_mbkm', 'aktivitas_mbkm.program_id', '=', 'program_mbkm.id')
            ->select(
                'users.name',
                'program_mbkm.nama_program',
                'aktivitas_mbkm.status_program'
            )
            ->get();

        return view(
            'dosen.dashboard',
            compact(
                'totalMahasiswa',
                'totalAktivitas',
                'totalProgress',
                'data'
            )
        );
    }

    public function detail($id)
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->join('users', 'aktivitas_mbkm.user_id', '=', 'users.id')
            ->join('program_mbkm', 'aktivitas_mbkm.program_id', '=', 'program_mbkm.id')
            ->where('aktivitas_mbkm.id', $id)
            ->select(
                'users.name',
                'program_mbkm.nama_program',
                'aktivitas_mbkm.status_program',
                'aktivitas_mbkm.learning_path',
                'aktivitas_mbkm.id'
            )
            ->first();

        $progress = DB::table('progress_mbkm')
            ->where('aktivitas_id', $id)
            ->get();

        return view(
            'dosen.detail-mahasiswa',
            compact(
                'aktivitas',
                'progress'
            )
        );
    }
}