@extends('layout.v_dashboard_tamplate')

@section('content')
<body>
    <div class="d-flex align-items-center mb-4">
        @if ($user && $user->foto_profile)
            <img src="{{ route('profile.foto', ['id' => $user->id]) }}" alt="Profile Photo" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; margin-right: 15px;">
        @else
            <img src="{{ asset('assets/img/profile.jpg') }}" alt="Default Profile" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; margin-right: 15px;">
        @endif
        <h3 class="mb-0">{{ $user->nama ?? 'User' }}</h3>
    </div>
    <h1>Summary</h1>
    <form method="GET" action="{{ route('dashboard_admin') }}" class="mb-3 d-flex align-items-center gap-2">
        <label for="month" class="mb-0">Filter Bulan:</label>
        <input type="month" id="month" name="month" class="form-control" style="max-width: 200px;"
            value="{{ isset($month) && isset($year) ? $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) : '' }}">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="{{ route('dashboard_admin') }}" class="btn btn-secondary btn-sm">Reset</a>
    </form>
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
