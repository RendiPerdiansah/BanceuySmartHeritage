@extends('layout.v_dashboard_tamplate')

@section('content')
<body>
    <h1>Summary</h1>
    <div class="summary-cards">
        <div class="card">
            <h2>Rp. {{ number_format($pendapatanHomestay + $pendapatanPaket, 0, ',', '.') }}</h2>
            <p>Total Pendapatan (Month to Date)</p>
        </div>
        <div class="card">
            <h2>{{ $totalTransactions }}</h2>
            <p>Total Transaksi (Month to Date)</p>
        </div>
        <div class="card">
            <h2>Rp. {{ number_format($pendapatanHomestay ?? 0, 0, ',', '.') }}</h2>
            <p>Pendapatan Pemesanan Homestay (Bulan Ini)</p>
        </div>
        <div class="card">
            <h2>Rp. {{ number_format($pendapatanPaket ?? 0, 0, ',', '.') }}</h2>
            <p>Pendapatan Pemesanan Paket (Bulan Ini)</p>
        </div>
        <div class="card">
            <h2>{{ $jumlahPengunjungHomestay ?? 0 }}</h2>
            <p>Jumlah Pengunjung Homestay (Bulan Ini)</p>
        </div>
        <div class="card">
            <h2>{{ $jumlahPengunjungPaket ?? 0 }}</h2>
            <p>Jumlah Pengunjung Paket (Bulan Ini)</p>
        </div>
    </div>

    </body>
@endsection
