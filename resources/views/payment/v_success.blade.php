@extends('layout.v_tamplate')

@section('content')
<div class="container mt-5">
    <div class="card text-center">
        <div class="card-header bg-success text-white">
            <h3>Transaksi Berhasil</h3>
        </div>
        <div class="card-body">
            <p>Terima kasih! Transaksi Anda telah berhasil diproses.</p>
            @if(isset($orderId))
                <p>Nomor Pesanan Anda: <strong>{{ $orderId }}</strong></p>
            @endif
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection
