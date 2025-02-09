<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Laporan Manajer Gudang</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 5px; text-align: left; }
        .header { text-align: center; margin-bottom: 20px; }
        .section-title { background: #f0f0f0; padding: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Stok dan Transaksi Barang</h2>
        <p>
            Periode:
            {{ $filters['start_date'] ?? '-' }} s/d {{ $filters['end_date'] ?? '-' }}
        </p>
    </div>

    <h3 class="section-title">Transaksi Barang Masuk</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomingTransactions as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->product->name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d') }}</td>
                <td>{{ $transaction->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="section-title">Transaksi Barang Keluar</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outgoingTransactions as $index => $transaction)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->product->name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d') }}</td>
                <td>{{ $transaction->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="section-title">Stock Opname</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Tanggal Opname</th>
                <th>Selisih</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stockOpnames as $index => $opname)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $opname->product->name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($opname->date)->format('Y-m-d') }}</td>
                <td>{{ $opname->difference }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
