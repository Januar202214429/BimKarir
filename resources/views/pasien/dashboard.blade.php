<!-- resources/views/dokter/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                Selamat datang, {{ Auth::user()->nama }}!
            </div>
        </div>
    </div>
</x-app-layout>
