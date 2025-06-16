<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JanjiPeriksa;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;

class JanjiPeriksaController extends Controller
{
    public function create()
    {
        // Ambil semua jadwal dokter
        $jadwalPeriksas = JadwalPeriksa::with('dokter')->get();
        return view('pasien.janji-periksa.create', compact('jadwalPeriksas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_periksa_id' => 'required|exists:jadwal_periksas,id',
        ]);

        JanjiPeriksa::create([
    'id_pasien' => Auth::id(),
    'id_jadwal_periksa' => $request->jadwal_periksa_id,
    'keluhan' => $request->keluhan,
    'no_antrian' => JanjiPeriksa::where('id_jadwal_periksa', $request->jadwal_periksa_id)->count() + 1,
    'status' => 'menunggu',
]);


        return redirect()->route('pasien.riwayat-periksa.index')->with('success', 'Berhasil mendaftar janji periksa!');
    }
}
