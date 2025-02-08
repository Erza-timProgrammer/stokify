@extends('admin.layout')

@section('content')
<div class="p-6 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Pengaturan Aplikasi</h1>
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="web_name" class="block text-gray-600 dark:text-gray-300 mb-1">Nama Web</label>
                <input type="text" id="web_name" name="web_name" value="{{ old('web_name', $setting->web_name ?? '') }}" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
            </div>
            <div class="mb-4">
                <label for="logo" class="block text-gray-600 dark:text-gray-300 mb-1">Logo</label>
                <input type="file" id="logo" name="logo" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
            </div>
            @if(isset($setting) && $setting->logo)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="w-32 h-32">
                </div>
            @endif
            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:hover:bg-green-400">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
