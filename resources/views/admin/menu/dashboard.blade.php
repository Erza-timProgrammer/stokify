@extends('admin.layout')

@section('content')
<!-- Main Content Container -->
<div class="p-6 w-full min-h-screen bg-gray-100">
    <div class="grid grid-cols-2 gap-6">
        <!-- Product Statistics Card -->
        <div class="bg-gray-300 dark:bg-slate-800 rounded-lg p-4">
            <h2 class="text-gray-900 dark:text-white text-2xl font-semibold mb-8">Jumlah Product</h2>
            <div class="flex justify-between items-center px-4">
                <div class="text-center">
                    <p class="text-gray-900 dark:text-white mb-4">Perabotan</p>
                    <p class="text-gray-900 dark:text-white text-4xl font-bold">{{ $productCounts['Perabotan'] }}</p>
                </div>
                <div class="text-center">
                    <p class="text-gray-900 dark:text-white mb-4">Elektronik</p>
                    <p class="text-gray-900 dark:text-white text-4xl font-bold">{{ $productCounts['Elektronik'] }}</p>
                </div>
                <div class="text-center">
                    <p class="text-gray-900 dark:text-white mb-4">Aksesoris</p>
                    <p class="text-gray-900 dark:text-white text-4xl font-bold">{{ $productCounts['Aksesoris'] }}</p>
                </div>
            </div>
        </div>

        <!-- Transaction Table Card -->
        <div class="bg-gray-300 dark:bg-slate-800 rounded-lg p-6">
            <h2 class="text-gray-900 dark:text-white text-2xl font-semibold mb-6">Transaction</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs uppercase">
                <th scope="col" class="px-6 py-3 text-gray-900 dark:text-white">
                    Type
                </th>
                <th scope="col" class="px-6 py-3 text-gray-900 dark:text-white">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-gray-900 dark:text-white">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
                <tr class="border-b">
                    <td class="px-6 py-4">
                    {{ $transaction->type }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $transaction->date }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $transaction->status }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
        </div>
    </div>

    <!-- Coming Soon Card -->
    <div class="bg-gray-300 dark:bg-slate-800 rounded-lg p-6 mt-6">
        <h2 class="text-gray-900 dark:text-white text-2xl font-semibold">Coming Soon</h2>
    </div>
</div>
@endsection