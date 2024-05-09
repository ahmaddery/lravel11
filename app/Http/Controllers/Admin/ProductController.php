<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
    
        // Filter berdasarkan nama produk
        if ($request->has('search')) {
            $query->where('nama_product', 'like', '%' . $request->search . '%');
        }
    
        // Filter berdasarkan rating (jika rating dipilih)
        if ($request->filled('rating') && $request->rating != 'pilih') {
            $query->where('rating', $request->rating);
        }
    
        $products = $query->paginate(5);
    
        return view('admin.product.index', compact('products'));
    }
    

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required',
            'deskripsi' => 'required',
            'harga' => 'nullable|string', // Tambahkan validasi untuk harga
            'rating' => 'nullable|integer|min:0|max:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $nama_foto = [];
        $fotoFields = ['foto', 'foto1', 'foto2', 'foto3', 'foto4'];
    
        foreach ($fotoFields as $field) {
            if ($request->hasFile($field)) {
                $foto = $request->file($field);
                $nama_foto[$field] = time() . '_' . $foto->getClientOriginalName();
                $foto->storeAs('public/foto_produk', $nama_foto[$field]);
            } else {
                $nama_foto[$field] = null;
            }
        }
    
        Product::create([
            'nama_product' => $request->nama_product,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga, // Simpan harga
            'rating' => $request->rating,
            'foto' => $nama_foto['foto'],
            'foto1' => $nama_foto['foto1'],
            'foto2' => $nama_foto['foto2'],
            'foto3' => $nama_foto['foto3'],
            'foto4' => $nama_foto['foto4'],
        ]);
    
        return redirect()->route('admin.products.index');
    }
    
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_product' => 'required',
            'deskripsi' => 'required',
            'rating' => 'nullable|integer|min:0|max:5',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $nama_foto = [];
        $fotoFields = ['foto', 'foto1', 'foto2', 'foto3', 'foto4'];
    
        foreach ($fotoFields as $field) {
            if ($request->hasFile($field)) {
                $foto = $request->file($field);
                $nama_foto[$field] = time() . '_' . $foto->getClientOriginalName();
                $foto->storeAs('public/foto_produk', $nama_foto[$field]);
                // Hapus foto lama jika ada
                if ($product->$field) {
                    Storage::delete('public/foto_produk/' . $product->$field);
                }
            } else {
                $nama_foto[$field] = $product->$field;
            }
        }
    
        $product->update([
            'nama_product' => $request->nama_product,
            'deskripsi' => $request->deskripsi,
            'rating' => $request->rating,
            'harga' => $request->harga,
            'foto' => $nama_foto['foto'],
            'foto1' => $nama_foto['foto1'],
            'foto2' => $nama_foto['foto2'],
            'foto3' => $nama_foto['foto3'],
            'foto4' => $nama_foto['foto4'],
        ]);
    
        return redirect()->route('admin.products.index');
    }
    

    public function destroy(Product $product)
    {
        $fotoFields = ['foto', 'foto1', 'foto2', 'foto3', 'foto4'];
    
        foreach ($fotoFields as $field) {
            if ($product->$field) {
                $fotoPath = 'public/foto_produk/'.$product->$field;
                if (Storage::exists($fotoPath)) {
                    Storage::delete($fotoPath);
                }
            }
        }
    
        $product->delete();
    
        return redirect()->route('admin.products.index');
    }
    
}
