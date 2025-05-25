@extends('layout.v_dashboard_tamplate')

@section('title', 'Data Paket')

@section('page', 'Data Paket')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/paket-table/add') }}" class="btn btn-primary mb-3">Tambah Paket</a>
            @if(session('pesan'))
                <div class="alert alert-success">{{ session('pesan') }}</div>
            @endif
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Data Paket</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Deskripsi Paket</th>
                                <th>Foto Paket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paket as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->nama_paket }}</td>
                                <td>{{ number_format($p->harga_paket, 0, ',', '.') }}</td>
                                <td>{{ $p->deskripsi_paket }}</td>
                                <td>
                                    @if($p->foto_paket)
                                        <img src="{{ asset('foto_paket/' . $p->foto_paket) }}" alt="Foto Paket" style="max-width: 100px;">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/paket-table/detail/' . $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ url('/paket-table/edit/' . $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('/paket-table/delete/' . $p->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                            @if(count($paket) == 0)
                            <tr>
                                <td colspan="5" class="text-center">Data paket tidak tersedia.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
