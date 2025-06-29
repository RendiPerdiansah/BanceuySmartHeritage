@extends('layout.v_dashboard_tamplate') 

@section('content')

    <!-- Section: Kelola Pesanan Homestay -->
    <section class="mb-8">
        <div class="container-fluid mt-4">
            <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Data Pesanan Homestay</h4>
        <a href="{{ route('tabel_pesanan_homestay.print') }}" target="_blank" class="btn btn-primary btn-sm">
            <i class="fas fa-print me-1"></i> Print
        </a>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('tabel_pesanan_homestay') }}" class="mb-3 d-flex align-items-center gap-2">
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
            <a href="{{ route('tabel_pesanan_homestay') }}" class="btn btn-secondary btn-sm">Reset</a>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
    <tr>
        <th>#</th>
        <th>Nama Pengunjung</th>
        <th>Alamat</th>
        <th>Lama Tinggal</th>
        <th>Tanggal Check In</th>
        <th>Tanggal Check Out</th>
        <th>Nama Homestay</th>
        <th>Harga Homestay</th>
        <th>Total Harga</th>
        <th>Status</th>
        <th>Bukti Pembayaran</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse($dataPesananHomestay as $index => $PesananHomestay)
    <tr>
        <td>{{ $index + 1 }}</td>
        
        <td>{{ $PesananHomestay->nama_pengunjung}}</td>
        <td>{{ $PesananHomestay->alamat }}</td>
        <td>{{ $PesananHomestay->lama_tinggal }}</td>
        <td>
            @php
                $checkInDate = $PesananHomestay->check_in;
                if (is_string($checkInDate)) {
                    try {
                        $checkInDate = \Carbon\Carbon::parse($checkInDate);
                    } catch (\Exception $e) {
                        $checkInDate = null;
                    }
                }
            @endphp
            {{ $checkInDate ? $checkInDate->format('d M Y') : '-' }}
        </td>
        <td>
            @php
                $checkOutDate = $PesananHomestay->check_out;
                if (is_string($checkOutDate)) {
                    try {
                        $checkOutDate = \Carbon\Carbon::parse($checkOutDate);
                    } catch (\Exception $e) {
                        $checkOutDate = null;
                    }
                }
            @endphp
            {{ $checkOutDate ? $checkOutDate->format('d M Y') : '-' }}
        </td>
        <td>{{ $PesananHomestay->nama_homestay }}</td>
        <td>{{ number_format($PesananHomestay->harga_homestay, 0, ',', '.') }}</td>
        <td>{{ number_format($PesananHomestay->total_harga, 0, ',', '.') }}</td>
        <td>{{ $PesananHomestay->status }}</td>
        <td>
            @if($PesananHomestay->bukti_pembayaran)
                <img src="{{ asset('foto_bukti_pembayaran/' . $PesananHomestay->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
            @else
                <span class="text-muted">Belum ada</span>
            @endif
        </td>
            <td>
                @if(isset($PesananHomestay->id_pemesanan) && !empty($PesananHomestay->id_pemesanan))
                <a href="{{ route('tabel_pesanan_homestay.edit', $PesananHomestay->id_pemesanan) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('tabel_pesanan_homestay.delete', $PesananHomestay->id_pemesanan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                @else
                <a href="#" class="btn btn-warning btn-sm disabled" tabindex="-1" aria-disabled="true">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="#" method="POST" class="d-inline">
                @endif
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
        <td colspan="7" class="text-center">Tidak ada data pesanan homestay</td>
    </tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </section>
@endsection
