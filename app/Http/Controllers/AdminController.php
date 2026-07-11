<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $totalAktivitas = DB::table('aktivitas_mbkm')->count();

        $berlangsung = DB::table('aktivitas_mbkm')
            ->where('status_program', 'Berlangsung')
            ->count();

        $selesai = DB::table('aktivitas_mbkm')
            ->where('status_program', 'Selesai')
            ->count();

        $keyword = $request->input('search');

        $aktivitas = DB::table('aktivitas_mbkm')
            ->join('users', 'aktivitas_mbkm.user_id', '=', 'users.id')
            ->join('program_mbkm', 'aktivitas_mbkm.program_id', '=', 'program_mbkm.id')
            ->select(
                'users.name',
                'program_mbkm.nama_program',
                'aktivitas_mbkm.status_program',
                'aktivitas_mbkm.id'
            )
            ->when($keyword, function ($query, $keyword) {
                return $query->where('users.name', 'LIKE', "%{$keyword}%");
            })
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalAktivitas',
                'berlangsung',
                'selesai',
                'aktivitas'
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
            'admin.detail-mbkm',
            compact(
                'aktivitas',
                'progress'
            )
        );
    }
}