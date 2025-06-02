<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JadwalPeriksa;

class JadwalPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua user yang memiliki role 'dokter'
        $dokters = User::where('role', 'dokter')->get();

        // Hari-hari kerja
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        // Buat jadwal untuk setiap dokter
        foreach ($dokters as $dokter) {
            // Ambil 2 hari kerja acak untuk tiap dokter berdasarkan ID-nya
            $doctorDays = array_slice($days, $dokter->id % 5, 2);

            $firstSchedule = true; // Hanya jadwal pertama yang aktif

            foreach ($doctorDays as $day) {
                // Jadwal pagi (08:00 - 12:00)
                JadwalPeriksa::create([
                    'id_dokter'   => $dokter->id,
                    'hari'        => $day,
                    'jam_mulai'   => '08:00:00',
                    'jam_selesai' => '12:00:00',
                    'status'      => $firstSchedule, // true hanya untuk jadwal pertama
                ]);

                $firstSchedule = false; // Jadwal berikutnya inaktif

                // Jadwal sore (13:00 - 16:00) hanya untuk dokter dengan ID genap
                if ($dokter->id % 2 == 0) {
                    JadwalPeriksa::create([
                        'id_dokter'   => $dokter->id,
                        'hari'        => $day,
                        'jam_mulai'   => '13:00:00',
                        'jam_selesai' => '16:00:00',
                        'status'      => false, // Semua jadwal sore tidak aktif
                    ]);
                }
            }
        }
    }
}
