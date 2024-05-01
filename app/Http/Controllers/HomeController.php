<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil total pengguna dengan usertype 'user' dari database
        $totalUsers = User::where('usertype', 'user')->count();

        // Mengirim data total pengguna ke view 'admin.dashboard'
        return view('admin.dashboard', compact('totalUsers'));
    }
}
