<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller{
    
    public function formProgress()
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->where('user_id', session('user_id'))
            ->first();

        if (!$aktivitas) {

            return redirect('/aktivitas')
                ->with('error', 'Silakan tambah program terlebih dahulu');

        }

        return view(
            'mahasiswa.progress',
            compact('aktivitas')
        );
    }

    public function createProgress($id)
    {
        $aktivitas = DB::table('aktivitas_mbkm')
            ->where('id', $id)
            ->first();

        return view(
            'mahasiswa.tambah_progress',
            compact('aktivitas')
        );
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