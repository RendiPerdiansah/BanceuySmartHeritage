@extends('layout.v_dashboard_tamplate') 

@section('content')

    <!-- Section: Kelola Pesanan Homestay -->
    <section class="mb-8">
        <div class="container-fluid mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Data pengunjung</h4>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Jumlah Pengunjung</th>
                                    <th>Kesan dan Pesan</th>
                                    <th>Dibuat Pada</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataBukuKunjungan as $index => $BukuKunjungan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $BukuKunjungan->nama_Pengunjung}}</td>
                                    <td>{{ $BukuKunjungan->alamat }}</td>
                                    <td>{{ $BukuKunjungan->tanggal_kunjungan }}</td>
                                    <td>{{ $BukuKunjungan->jumlah_pengunjung }}</td>
                                    <td>{{ $BukuKunjungan->kesan_pesan }}</td>
                                    <td>{{ $BukuKunjungan->created_at->format('d M Y') }}</td>
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
                                    <td colspan="6" class="text-center">Tidak ada data buku pengunjung</td>
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