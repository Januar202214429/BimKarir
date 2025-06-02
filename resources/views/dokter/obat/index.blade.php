<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Obat</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Tombol Tambah Obat --}}
            <a href="{{ route('dokter.obat.create') }}"
               class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Tambah Obat
            </a>

            {{-- Tampilkan pesan sukses --}}
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            {{-- Tabel Daftar Obat --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Nama Obat</th>
                            <th class="px-4 py-2">Kemasan</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obats as $obat)
                            <tr>
                                <td class="border px-4 py-2">{{ $obat->nama_obat }}</td>
                                <td class="border px-4 py-2">{{ $obat->kemasan }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($obat->harga, 2, ',', '.') }}</td>
                                <td class="border px-4 py-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('dokter.obat.edit', $obat->id) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-black">
                                        Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('dokter.obat.destroy', $obat->id) }}" method="POST"
                                          class="inline-block ml-1"
                                          onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-black">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($obats->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-4">Tidak ada data obat.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
