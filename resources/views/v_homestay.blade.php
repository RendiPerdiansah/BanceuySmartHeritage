@extends('layout.v_dashboard_tamplate') 

@section('title', 'Homestay')

@section('page', 'Halaman Homestay')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Homestay</h4>
            <a href="/homestay-table/add" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Tambah Homestay
            </a>
        </div>

        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Sukses</h5>
            {{ session('pesan') }}
        </div>    
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Homestay</th>
                            <th>Deskripsi</th>
                            <th>Harga Homestay</th>
                            <th>Foto Homestay</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($homestay as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->nama_homestay }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>{{ $data->fasilitas }}</td>
                            <td>{{ $data->harga_homestay }}</td>
                            <td><img src="{{ url('foto_homestay/' . $data->foto_homestay) }}" width="100px"></td>
                            <td>
                                <a href="/homestay-table/detail/{{ $data->id_homestay }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="/homestay-table/edit/{{ $data->id_homestay }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $data->id_homestay }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data homestay</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @foreach ($homestay as $data)
        <div class="modal fade" id="delete{{ $data->id_homestay }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->nama_homestay }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/homestay-table/delete/{{ $data->id_homestay }}" class="btn btn-outline-light">Yes</a>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
