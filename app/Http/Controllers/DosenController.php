<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $totalAktivitas = DB::table('aktivitas_mbkm')->count();

        $berlangsung = DB::table('aktivitas_mbkm')
            ->where('status_program', 'Berlangsung')
            ->count();

        $selesai = DB::table('aktivitas_mbkm')
            ->where('status_program', 'Selesai')
            ->count();

        $data = DB::table('aktivitas_mbkm')
            ->join('users', 'aktivitas_mbkm.user_id', '=', 'users.id')
            ->join('program_mbkm', 'aktivitas_mbkm.program_id', '=', 'program_mbkm.id')
            ->leftJoin('progress_mbkm', 'aktivitas_mbkm.id', '=', 'progress_mbkm.aktivitas_id')
            ->select(
                'aktivitas_mbkm.id',
                'users.name',
                'program_mbkm.nama_program',
                'aktivitas_mbkm.status_program',
                'progress_mbkm.id as progress_id',
                'progress_mbkm.bulan',
                'progress_mbkm.progress'
            )
            ->orderBy('aktivitas_mbkm.id')
            ->get()
            ->groupBy('id');

        return view(
            'dosen.dashboard',
            compact(
                'totalAktivitas',
                'berlangsung',
                'selesai',
                'data'
            )
        );
    }

        public function detailDashboard($id)
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->join('users', 'users.id', '=', 'aktivitas_mbkm.user_id')
            ->join('program_mbkm', 'program_mbkm.id', '=', 'aktivitas_mbkm.program_id')
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
            ->leftJoin(
                'komentar_dosen',
                'progress_mbkm.id',
                '=',
                'komentar_dosen.progress_id'
            )
            ->where(
                'progress_mbkm.aktivitas_id',
                $id
            )
            ->select(
                'progress_mbkm.*',
                'komentar_dosen.id as komentar_id',
                'komentar_dosen.komentar'
            )
            ->get();

        return view(
            'dosen.detail-dashboard',
            compact(
                'aktivitas',
                'progress'
            )
        );
    }

    public function detailMahasiswa($id)
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->join('users', 'users.id', '=', 'aktivitas_mbkm.user_id')
            ->join('program_mbkm', 'program_mbkm.id', '=', 'aktivitas_mbkm.program_id')
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
            ->leftJoin(
                'komentar_dosen',
                'progress_mbkm.id',
                '=',
                'komentar_dosen.progress_id'
            )
            ->where(
                'progress_mbkm.aktivitas_id',
                $id
            )
            ->select(
                'progress_mbkm.*',
                'komentar_dosen.id as komentar_id',
                'komentar_dosen.komentar'
            )
            ->get();

        return view(
            'dosen.detail-mahasiswa',
            compact(
                'aktivitas',
                'progress'
            )
        );
    }

    public function informasiMahasiswa(Request $request)
    {
        $query = DB::table('aktivitas_mbkm')
            ->join('users', 'aktivitas_mbkm.user_id', '=', 'users.id')
            ->join('program_mbkm', 'aktivitas_mbkm.program_id', '=', 'program_mbkm.id')
            ->leftJoin('progress_mbkm', 'aktivitas_mbkm.id', '=', 'progress_mbkm.aktivitas_id')
            ->leftJoin('komentar_dosen', 'progress_mbkm.id', '=', 'komentar_dosen.progress_id')
            ->where('users.role', 'mahasiswa');

        if ($request->search) {
            $query->where(
                'users.name',
                'like',
                '%' . $request->search . '%'
            );
        }

        $mahasiswa = $query
            ->select(
                'aktivitas_mbkm.id',
                'users.name',
                'program_mbkm.nama_program',
                'progress_mbkm.bulan',
                'progress_mbkm.progress',
                'komentar_dosen.komentar'
            )
            ->orderBy('users.name')
            ->get()
            ->groupBy('id');

        return view(
            'dosen.informasi_mahasiswa',
            compact('mahasiswa')
        );
    }

    public function updateKomentar(Request $request, $id)
    {
        DB::table('komentar_dosen')

            ->where('progress_id', $id)

            ->update([

                'komentar' => $request->komentar,

                'updated_at' => now()

            ]);

        return redirect()->back();
    }

    public function formTambahKomentar($id)
    {
        $progress = DB::table('progress_mbkm')
            ->where('id', $id)
            ->first();

        return view(
            'dosen.tambah_komentar',
            compact('progress')
        );
    }

    public function storeKomentar(Request $request)
    {
        DB::table('komentar_dosen')->insert([

            'progress_id' => $request->progress_id,

            'dosen_id' => session('user_id'),

            'komentar' => $request->komentar,

            'created_at' => now(),

            'updated_at' => now()

        ]);

        return redirect()->back();
    }
}