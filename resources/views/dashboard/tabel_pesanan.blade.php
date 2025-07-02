@extends('layout.v_dashboard_tamplate') 

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
<div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="card-title">Data Pesanan</h4>
    <a href="{{ route('tabel_pesanan.print') }}" target="_blank" class="btn btn-primary btn-sm">
        <i class="fas fa-print me-1"></i> Print
    </a>
</div>
    <div class="card-body">
        <form method="GET" action="{{ route('tabel_pesanan') }}" class="mb-3 d-flex align-items-center gap-2">
            <label for="month" class="mb-0">Filter Bulan:</label>
            <input type="month" id="month" name="month" class="form-control" style="max-width: 200px;"
                value="{{ isset($month) && isset($year) ? $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) : '' }}">

            <label for="status" class="mb-0">Status Pembayaran:</label>
            <select id="status" name="status" class="form-select" style="max-width: 200px;">
                <option value="" {{ !isset($status) || $status === '' ? 'selected' : '' }}>Semua</option>
                <option value="paid" {{ isset($status) && $status === 'paid' ? 'selected' : '' }}>Sudah Dibayar</option>
                <option value="unpaid" {{ isset($status) && $status === 'unpaid' ? 'selected' : '' }}>Belum Dibayar</option>
            </select>

            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            <a href="{{ route('tabel_pesanan') }}" class="btn btn-secondary btn-sm">Reset</a>
        </form>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
    <tr>
        <th>No</th>
        <th>Nama Pengunjung</th>
        <th>No Telepon</th>
        <th>Alamat</th>
        <th>Tanggal Kunjungan</th>
        <th>Jumlah Pengunjung</th>
        <th>Nama Paket</th>
        
        <th>Catatan Tambahan</th>
        <th>Status Pesanan</th>
        <th>Bukti Pembayaran</th>
        <th>Dibuat Pada</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse($dataPesanan as $index => $pesanan)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $pesanan->nama_pengunjung }}</td>
        <td>{{ $pesanan->no_hp }}</td>
        <td>{{ $pesanan->alamat }}</td>
        <td>{{ $pesanan->tanggal_kunjungan }}</td>
        <td>{{ $pesanan->jumlah_pengunjung }}</td>
        <td>{{ $pesanan->nama_paket }}</td>
        
        <td>{{ $pesanan->catatan_tambahan }}</td>
        <td>{{ $pesanan->status ?? '-' }}</td>
        <td>
            @if($pesanan->bukti_pembayaran)
                <img src="{{ asset('foto_bukti_pembayaran/' . $pesanan->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
            @else
                <span class="text-muted">Belum ada</span>
            @endif
        </td>
        <td>{{ $pesanan->created_at->format('d M Y') }}</td>
        <td>
           
            <form action="" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7" class="text-center">Tidak ada data pesanan paket.</td>
    </tr>
    @endforelse
</tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
