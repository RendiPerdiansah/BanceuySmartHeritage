@extends('layout.v_dashboard_tamplate')

@section('title', 'Edit Paket')

@section('page', 'Edit Paket')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Paket</h5>
                </div>

                <div class="card-body">
                    <form action="{{ url('/paket-table/update/' . $paket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}">
                            @error('nama_paket')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_paket" class="form-label">Harga Paket</label>
                            <input type="number" class="form-control" id="harga_paket" name="harga_paket" value="{{ old('harga_paket', $paket->harga_paket) }}">
                            @error('harga_paket')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_paket" class="form-label">Deskripsi Paket</label>
                            <textarea class="form-control" id="deskripsi_paket" name="deskripsi_paket" rows="4">{{ old('deskripsi_paket', $paket->deskripsi_paket) }}</textarea>
                            @error('deskripsi_paket')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto_paket" class="form-label">Foto Paket</label>
                            <input type="file" class="form-control" id="foto_paket" name="foto_paket" accept="image/*">
                            @error('foto_paket')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if($paket->foto_paket)
                                <img src="{{ asset('foto_paket/' . $paket->foto_paket) }}" alt="Foto Paket" class="img-thumbnail mt-2" style="max-width: 200px;">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Update Paket</button>
                        <a href="{{ url('/paket-table') }}" class="btn btn-secondary ms-2">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
