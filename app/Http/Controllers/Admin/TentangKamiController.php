<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TentangKami;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tentang_kami = TentangKami::all();
        return view('admin.tentangkami.index', compact('tentang_kami'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tentangkami.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pelanggan' => 'nullable|string|max:255',
            'project' => 'nullable|string|max:255',
        ]);

        $validatedData = $request->all();

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/tentangkami');
            $validatedData['foto'] = $fotoPath;
        }

        TentangKami::create($validatedData);

        return redirect()->route('tentangkami.index')
                         ->with('success', 'Tentang Kami berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TentangKami  $tentangKami
     * @return \Illuminate\Http\Response
     */
    public function edit(TentangKami $tentangkami)
    {
        return view('admin.tentangkami.edit', compact('tentangkami'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TentangKami  $tentangKami
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TentangKami $tentangkami)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pelanggan' => 'nullable|string|max:255',
            'project' => 'nullable|string|max:255',
        ]);

        $validatedData = $request->all();

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/tentangkami');
            $validatedData['foto'] = $fotoPath;

            // Hapus foto lama jika ada
            if ($tentangkami->foto) {
                Storage::delete($tentangkami->foto);
            }
        }

        $tentangkami->update($validatedData);

        return redirect()->route('tentangkami.index')
                         ->with('success', 'Tentang Kami berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TentangKami  $tentangKami
     * @return \Illuminate\Http\Response
     */
    public function destroy(TentangKami $tentangkami)
    {
        $tentangkami->delete();

        return redirect()->route('tentangkami.index')
                         ->with('success', 'Tentang Kami berhasil dihapus.');
    }
}
