<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Product;
use App\Models\Informasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        // Mendapatkan keranjang pengguna yang saat ini masuk
        $userId = Auth::id();
        $keranjang = Keranjang::with('product')->where('user_id', $userId)->get();
        $informasis = Informasi::all();
    
        // Hitung total harga semua barang di keranjang
        $totalHarga = $keranjang->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });
    
        // Tampilkan halaman keranjang dengan data keranjang dan total harga
        return view('keranjang', compact('keranjang', 'informasis', 'totalHarga'));
    }
    

    // Metode untuk menambahkan produk ke keranjang
    public function tambahkanKeKeranjang(Request $request, $productId)
    {
        // Periksa apakah pengguna sudah masuk
        if (!Auth::check()) {
            // Jika pengguna belum masuk, arahkan ke halaman login
            return redirect()->route('login')->with('error', 'Silakan masuk terlebih dahulu untuk menambahkan produk ke keranjang.');
        }

        // Mendapatkan user_id dari session pengguna yang saat ini masuk
        $userId = Auth::id();

        // Periksa apakah produk sudah ada dalam keranjang
        $existingItem = Keranjang::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();

        if ($existingItem) {
            // Jika produk sudah ada dalam keranjang, tambahkan kuantitasnya
            $existingItem->increment('quantity');
        } else {
            // Jika produk belum ada dalam keranjang, buat entri baru
            Keranjang::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        // Redirect pengguna ke halaman keranjang
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

        // Metode untuk memperbarui jumlah produk dalam keranjang
        public function update(Request $request, $itemId)
        {
            // Validasi request
            $request->validate([
                'quantity' => 'required|integer|min:1', // Pastikan kuantitas adalah bilangan bulat positif
            ]);
    
            // Dapatkan item keranjang berdasarkan ID
            $item = Keranjang::findOrFail($itemId);
    
            // Update kuantitas produk
            $item->quantity = $request->input('quantity');
            $item->save();
    
            // Redirect kembali ke halaman keranjang dengan pesan sukses
            return redirect()->route('keranjang')->with('success', 'Kuantitas produk berhasil diperbarui.');
        }
            // Method untuk menghapus produk dari keranjang
    public function hapus($itemId)
    {
        // Temukan item keranjang berdasarkan ID
        $item = Keranjang::findOrFail($itemId);

        // Hapus item dari keranjang
        $item->delete();

        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('keranjang')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
