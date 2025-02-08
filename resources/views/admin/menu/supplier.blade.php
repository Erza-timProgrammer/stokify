@extends('admin.layout')

@section('content')
<div class="p-6 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Header -->
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">
        Manajemen Data Supplier
    </h1>
    <p class="mb-4 text-gray-700 dark:text-gray-300">
        Admin: {{ $name }} ({{ $email }})
    </p>

    <!-- Tabel Data Supplier -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden mb-6">
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Supplier</th>
                    <th class="py-3 px-6">Alamat</th>
                    <th class="py-3 px-6">Kontak</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                @forelse ($suppliers as $index => $supplier)
                    <tr class="border-b hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $index + 1 }}</td>
                        <td class="py-3 px-6">{{ $supplier->name }}</td>
                        <td class="py-3 px-6">{{ $supplier->address }}</td>
                        <td class="py-3 px-6">{{ $supplier->phone }}</td>
                        <td class="py-3 px-6">
                            <!-- Tombol Edit (jika sudah ada fitur edit) -->
                            <a href="{{ route('admin.menu.suppliers.edit', $supplier->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 dark:hover:bg-blue-400">Edit</a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 dark:hover:bg-red-400" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-3 px-6 text-center">Tidak ada data supplier.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Form Tambah Supplier -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Tambah Supplier Baru</h2>
        <form action="{{ route('admin.suppliers.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nama Supplier -->
                <div>
                    <label for="name" class="block text-gray-600 dark:text-gray-300 mb-1">Nama Supplier</label>
                    <input type="text" id="name" name="name" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                </div>
                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-gray-600 dark:text-gray-300 mb-1">Alamat</label>
                    <input type="text" id="address" name="address" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Kontak (Telepon) -->
                <div>
                    <label for="phone" class="block text-gray-600 dark:text-gray-300 mb-1">Kontak</label>
                    <input type="text" id="phone" name="phone" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-600 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 dark:hover:bg-green-400">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
