@extends('layout.v_dashboard_tamplate')

@section('title', 'Tambah Homestay')

@section('page', 'Tambah Data Homestay')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Homestay</h5>
                    <a href="/homestay-table" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <!-- Form untuk tambah homestay -->
                <form action="/homestay-table/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        
                        <!-- Nama Homestay -->
                        <div class="mb-3">
                            <label for="nama_homestay" class="form-label fw-bold">Nama Homestay</label>
                            <input type="text" name="nama_homestay" class="form-control" id="nama_homestay" placeholder="Masukkan Nama Homestay" value="{{ old('nama_homestay') }}">
                            <div class="text-danger">
                                @error('nama_homestay')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Harga Homestay -->
                        <div class="mb-3">
                            <label for="harga_homestay" class="form-label fw-bold">Harga Homestay</label>
                            <input type="text" name="harga_homestay" class="form-control" id="harga_homestay" placeholder="Masukkan Harga Homestay" value="{{ old('harga_homestay') }}">
                            <div class="text-danger">
                                @error('harga_homestay')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Foto Homestay -->
                        <div class="mb-3">
                            <label for="foto_homestay" class="form-label fw-bold">Foto Homestay</label>
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <input type="file" name="foto_homestay" class="custom-file-input" id="foto_homestay">
                                    <label class="custom-file-label" for="foto_homestay">Pilih file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <div class="text-danger">
                                @error('foto_homestay')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Tambah Homestay
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
