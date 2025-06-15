@extends('layout.v_dashboard_tamplate')

@section('content')
<div class="container mt-4">
    <h4>Daftar Transaksi Pemesanan Homestay Belum Dibayar</h4>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengunjung</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Lama Tinggal</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($unpaidOrders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->nama_pengunjung }}</td>
                    <td>{{ $order->no_hp }}</td>
                    <td>{{ $order->alamat }}</td>
                    <td>{{ $order->check_in }}</td>
                    <td>{{ $order->check_out }}</td>
                    <td>{{ $order->lama_tinggal }} Hari</td>
                    <td>Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ url('/payment/homestay/' . $order->order_id . '/pay') }}" class="btn btn-primary btn-sm">Bayar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">Tidak ada transaksi belum dibayar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
