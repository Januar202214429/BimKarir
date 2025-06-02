{{-- resources/views/dokter/obat/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Tambah Obat</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('dokter.obat.store') }}" method="POST">
                    @csrf

                    {{-- Nama Obat --}}
                    <div class="mb-4">
                        <label for="nama_obat" class="block font-medium text-sm text-gray-700">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               required>
                    </div>

                    {{-- Kemasan --}}
                    <div class="mb-4">
                        <label for="kemasan" class="block font-medium text-sm text-gray-700">Kemasan</label>
                        <input type="text" name="kemasan" id="kemasan"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               required>
                    </div>

                    {{-- Harga --}}
                    <div class="mb-4">
                        <label for="harga" class="block font-medium text-sm text-gray-700">Harga</label>
                        <input type="number" name="harga" id="harga"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               required>
                    </div>

                    {{-- Tombol Simpan --}}
<div class="flex justify-end">
    <button type="submit"
        class="bg-blue-500 hover:bg-blue-600 text-black">
        Simpan
    </button>
</div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
