@extends('layout.v_dashboard_tamplate')

@section('title', 'Edit Homestay')

@section('page', 'Edit Data Homestay')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Homestay</h5>
                    <a href="/homestay-table" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <form action="/homestay-table/update/{{ $homestay->id_homestay }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Homestay</label>
                            <input type="text" name="nama_homestay" class="form-control" value="{{ $homestay->nama_homestay }}" readonly>
                            @error('nama_homestay')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Harga Homestay</label>
                            <input type="text" name="harga_homestay" class="form-control" value="{{ $homestay->harga_homestay }}">
                            @error('harga_homestay')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto Homestay</label>
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <input type="file" name="foto_homestay" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('foto_homestay')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <div class="mt-2">
                                <img src="{{ url('foto_homestay/' . $homestay->foto_homestay) }}" class="img-thumbnail" style="max-width: 200px;" alt="Foto Homestay">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Update
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
