<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    Public function index()
    {
        return view('mahasiswa.dashboard');
    }
    public function getProgram()
    {
        $program = DB::table('program_mbkm')->get();

        return view('mahasiswa.dashboard', ['program' => $program]);
    }
}