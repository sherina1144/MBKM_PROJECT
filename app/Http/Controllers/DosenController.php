<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function informasiMahasiswa(Request $request)
    {
        $query = DB::table('users')
            ->join('aktivitas_mbkm', 'users.id', '=', 'aktivitas_mbkm.user_id')
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

                'users.name',

                'program_mbkm.nama_program',

                'progress_mbkm.bulan',

                'progress_mbkm.progress',

                'komentar_dosen.komentar',

                'aktivitas_mbkm.id'

            )

            ->orderBy('users.name')

            ->get();

        return view(
            'dosen.informasi_mahasiswa',
            compact('mahasiswa')
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

                'komentar_dosen.komentar'

            )

            ->get();


        return view(

            'dosen.detail_mahasiswa',

            compact(

                'aktivitas',

                'progress'

            )

        );
    }

    public function simpanKomentar(Request $request)
    {

        DB::table('komentar_dosen')->updateOrInsert(

            [

                'progress_id' => $request->progress_id,

                'dosen_id' => session('user_id')

            ],

            [

                'komentar' => $request->komentar,

                'updated_at' => now(),

                'created_at' => now()

            ]

        );

        return back();
    }
}
