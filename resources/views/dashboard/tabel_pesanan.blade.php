@extends('layout.v_dashboard_tamplate') 

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Pesanan</h4>
            {{-- <a href="#" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Tambah 
            </a> --}}
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
                            <th>Nama Homestay</th>
                            <th>Catatan Tambahan</th>
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
                            <td>{{ $pesanan->nama_homestay }}</td>
                            <td>{{ $pesanan->catatan_tambahan }}</td>
                            <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
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
                            <td colspan="6" class="text-center">Tidak ada data akun</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection