<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Obat</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('dokter.obat.update', $obat->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_obat" class="block text-gray-700">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label for="kemasan" class="block text-gray-700">Kemasan</label>
                        <input type="text" name="kemasan" id="kemasan" value="{{ old('kemasan', $obat->kemasan) }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="block text-gray-700">Harga</label>
                        <input type="number" name="harga" id="harga" value="{{ old('harga', $obat->harga) }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('dokter.obat.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
