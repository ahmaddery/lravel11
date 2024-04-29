<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Judul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juduls = Judul::all();
        return view('admin.judul.index', compact('juduls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.judul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('public/judul');
        $validatedData['foto'] = $fotoPath;

        Judul::create($validatedData);

        return redirect()->route('admin.judul.index')->with('success', 'Judul berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Judul  $judul
     * @return \Illuminate\Http\Response
     */
    public function show(Judul $judul)
    {
        return view('admin.judul.show', compact('judul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Judul  $judul
     * @return \Illuminate\Http\Response
     */
    public function edit(Judul $judul)
    {
        return view('admin.judul.edit', compact('judul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Judul  $judul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Judul $judul)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete($judul->foto);
            $fotoPath = $request->file('foto')->store('public/judul');
            $validatedData['foto'] = $fotoPath;
        }

        $judul->update($validatedData);

        return redirect()->route('admin.judul.index')->with('success', 'Judul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Judul  $judul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Judul $judul)
    {
        Storage::delete($judul->foto);
        $judul->delete();

        return redirect()->route('admin.judul.index')->with('success', 'Judul berhasil dihapus.');
    }
}
