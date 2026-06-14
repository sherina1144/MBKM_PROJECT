<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $program = DB::table('program_mbkm')->get();

        return view(
            'mahasiswa.dashboard',
            compact('program')
        );
    }

    public function getProgram()
    {
        $program = DB::table('program_mbkm')->get();

        return view(
            'mahasiswa.dashboard',
            compact('program')
        );
    }
}