@extends('layout.v_dashboard_tamplate')

@section('title', 'Detail Homestay')

@section('page', 'Halaman Detail Homestay')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Homestay</h5>
                    <a href="/homestay-table" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Homestay:</label>
                        <p class="form-control-plaintext">{{ $homestay->nama_homestay }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga Homestay:</label>
                        <p class="form-control-plaintext">Rp{{ number_format($homestay->harga_homestay, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Foto Homestay:</label><br>
                        <img src="{{ url('foto_homestay/' . $homestay->foto_homestay) }}" alt="Foto Homestay" class="img-fluid rounded border" style="max-width: 300px;">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
