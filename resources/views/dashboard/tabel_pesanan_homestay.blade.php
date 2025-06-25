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
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Pengunjung</th>
                        <th>Alamat</th>
                        <th>Lama Tinggal</th>
                        <th>Tanggal check in</th>
                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataPesananHomestay as $index => $PesananHomestay)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $PesananHomestay->nama_Pengunjung}}</td>
                        <td>{{ $PesananHomestay->alamat }}</td>
                        <td>{{ $PesananHomestay->lama_tinggal }}</td>
                        <td>{{ $PesananHomestay->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
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
                        <td colspan="6" class="text-center">Tidak ada data pesanan homestay</td>
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