<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil total pengguna dengan usertype 'user' dari database
        $totalUsers = User::where('usertype', 'user')->count();

        // Mengambil total produk dari database
        $totalProducts = Product::count();

        // Mengirim data total pengguna dan total produk ke view 'admin.dashboard'
        return view('admin.dashboard', compact('totalUsers', 'totalProducts'));
    }
}
