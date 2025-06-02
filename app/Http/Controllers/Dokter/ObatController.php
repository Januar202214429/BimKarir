<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Menampilkan daftar semua obat.
     */
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats'));
    }

    /**
     * Menampilkan form untuk membuat obat baru.
     */
    public function create()
    {
        return view('dokter.obat.create');
    }

    /**
     * Menyimpan data obat baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        Obat::create($request->all());

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data obat.
     */
    public function edit(Obat $obat)
    {
        return view('dokter.obat.edit', compact('obat'));
    }

    /**
     * Memperbarui data obat yang dipilih.
     */
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        $obat->update($request->all());

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil diperbarui.');
    }

    /**
     * Menghapus data obat dari database.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}
