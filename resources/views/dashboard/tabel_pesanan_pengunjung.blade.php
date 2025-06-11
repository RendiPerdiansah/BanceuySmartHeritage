@extends('layout.v_dashboard_tamplate')

@section('content')
<div class="container mt-4">
    <h4>Daftar Pemesanan Paket Saya</h4>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengunjung</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Jumlah Pengunjung</th>
                    <th>Nama Paket</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataPesananPengunjung as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->nama_pengunjung }}</td>
                    <td>{{ $order->no_hp }}</td>
                    <td>{{ $order->alamat }}</td>
                    <td>{{ $order->tanggal_kunjungan }}</td>
                    <td>{{ $order->jumlah_pengunjung }}</td>
                    <td>{{ $order->nama_paket }}</td>
                    <td>Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ url('/payment/' . $order->order_id . '/pay') }}" class="btn btn-primary btn-sm">Bayar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">Tidak ada pemesanan paket.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
