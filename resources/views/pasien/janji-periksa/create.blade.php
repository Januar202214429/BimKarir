<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Janji Periksa') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm p-6 rounded-lg">
            <form method="POST" action="{{ route('pasien.janji-periksa.store') }}">
                @csrf

                {{-- Jadwal Periksa --}}
                <div class="mb-4">
                    <label for="jadwal_periksa_id" class="block font-semibold text-gray-700">Pilih Jadwal Periksa</label>
                    <select name="jadwal_periksa_id" id="jadwal_periksa_id" class="form-select w-full mt-1" required>
                        <option value="" disabled selected>-- Pilih Jadwal --</option>
                        @foreach($jadwalPeriksas as $jadwal)
                            <option value="{{ $jadwal->id }}">
                                {{ $jadwal->hari }} - 
                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} s/d 
                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                ({{ $jadwal->dokter->nama }} - {{ $jadwal->dokter->poli }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Keluhan --}}
                <div class="mb-4">
                    <label for="keluhan" class="block font-semibold text-gray-700">Keluhan</label>
                    <textarea name="keluhan" id="keluhan" rows="3" class="form-textarea w-full mt-1" placeholder="Masukkan keluhan Anda (opsional)"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
