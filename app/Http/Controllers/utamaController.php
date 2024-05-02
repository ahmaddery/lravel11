<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use App\Models\Informasi; // Mengimport model Informasi
use App\Models\TentangKami;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
    public function index()
    {
        $juduls = Judul::all();
        $informasis = Informasi::all(); // Mengambil semua data informasi dari model Informasi
        $tentang_kami = TentangKami::all();
        return view('index', compact('juduls', 'informasis','tentang_kami')); // Mengirimkan data judul dan informasi ke view index
    }
}
