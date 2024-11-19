@extends('admin.layout')

@section('content')
<!-- Main Content Container -->
<div class="p-2 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
  <header class="py-4 mb-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Overview</h1>
      <!-- Menampilkan nama pengguna -->
      <p class="text-gray-600 dark:text-gray-300"><span class="text-red-500">Welcome,</span> {{ $name }} ({{ $email }})</p>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Menampilkan jumlah produk berdasarkan kategori -->
      @foreach($productCounts as $category => $count)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">{{ $category }}</h2>
          <p class="text-4xl font-bold text-gray-800 dark:text-gray-100">{{ $count }}</p>
          <p class="text-gray-500 dark:text-gray-400 text-sm">Total produk dalam kategori {{ $category }}</p>
        </div>
      @endforeach
    </div>

    <!-- Menampilkan transaksi stok -->
    <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
      <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Transaksi Stok</h2>
      <table class="w-full text-left">
        <thead>
          <tr>
            <th class="px-4 py-2 text-gray-600 dark:text-gray-300">ID</th>
            <th class="px-4 py-2 text-gray-600 dark:text-gray-300">Nama Produk</th>
            <th class="px-4 py-2 text-gray-600 dark:text-gray-300">Jumlah</th>
            <th class="px-4 py-2 text-gray-600 dark:text-gray-300">Tanggal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($transactions as $transaction)
            <tr class="border-t border-gray-200 dark:border-gray-700">
              <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $transaction->id }}</td>
              <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $transaction->product->name }}</td>
              <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $transaction->quantity }}</td>
              <td class="px-4 py-2 text-gray-800 dark:text-gray-100">{{ $transaction->created_at->format('d-m-Y') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>

  <footer class="bg-white dark:bg-gray-900 text-gray-600 dark:text-gray-300 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
      <p>&copy; 2019-2024 FlowOrb. All rights reserved.</p>
      <div class="space-x-4">
        <a href="#" class="hover:text-gray-400 dark:hover:text-gray-500">Privacy Policy</a>
        <a href="#" class="hover:text-gray-400 dark:hover:text-gray-500">Licensing</a>
        <a href="#" class="hover:text-gray-400 dark:hover:text-gray-500">Cookie Policy</a>
        <a href="#" class="hover:text-gray-400 dark:hover:text-gray-500">Contact</a>
      </div>
    </div>
  </footer>
</div>

@endsection