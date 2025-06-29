@extends('layout.v_dashboard_tamplate')

@section('title', 'Tambah Homestay')

@section('page', 'Tambah Homestay')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Homestay</h5>
                </div>

                <div class="card-body">
                    <form action="{{ url('/homestay-table/insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_homestay" class="form-label">Nama Homestay</label>
                            <input type="text" class="form-control" id="nama_homestay" name="nama_homestay" placeholder="Masukkan Nama Homestay" value="{{ old('nama_homestay') }}">
                            @error('nama_homestay')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_homestay" class="form-label">Harga Homestay</label>
                            <input type="number" class="form-control" id="harga_homestay" name="harga_homestay" placeholder="Masukkan Harga Homestay" value="{{ old('harga_homestay') }}">
                            @error('harga_homestay')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi Homestay">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto_homestay" class="form-label">Foto Homestay</label>
                            <input type="file" class="form-control" id="foto_homestay" name="foto_homestay" accept="image/*">
                            @error('foto_homestay')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas</label>
                            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3" placeholder="Masukkan Fasilitas Homestay, pisahkan dengan koma" >{{ old('fasilitas') }}</textarea>
                            @error('fasilitas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Homestay</button>
                        <a href="{{ url('/homestay-table') }}" class="btn btn-secondary ms-2">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
