@extends('layout.v_dashboard_tamplate')

@section('title', 'Detail Paket')

@section('page', 'Detail Paket')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail Paket</h5>
                </div>

                <div class="card-body">
                    <h4>{{ $paket->nama_paket }}</h4>
                    <p><strong>Harga Paket:</strong> {{ number_format($paket->harga_paket, 0, ',', '.') }}</p>
                    <p><strong>Deskripsi Paket:</strong></p>
                    <p>{{ $paket->deskripsi_paket }}</p>
                    @if($paket->foto_paket)
                        <img src="{{ asset('foto_paket/' . $paket->foto_paket) }}" alt="Foto Paket" class="img-fluid" style="max-width: 400px;">
                    @endif
                    <div class="mt-3">
                        <a href="{{ url('/paket-table') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ url('/paket-table/edit/' . $paket->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
