@extends('layout.v_dashboard_tamplate')

@section('content')
<section class="mb-8">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Pesanan Paket</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tabel_pesanan.update', $pesanan->id_pesanan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_pengunjung" class="form-label">Nama Pengunjung</label>
                        <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" value="{{ old('nama_pengunjung', $pesanan->nama_pengunjung) }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                        <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan', $pesanan->tanggal_kunjungan) }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_paket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ old('nama_paket', $pesanan->nama_paket) }}">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_pengunjung" class="form-label">Jumlah Pengunjung</label>
                        <input type="number" class="form-control" id="jumlah_pengunjung" name="jumlah_pengunjung" value="{{ old('jumlah_pengunjung', $pesanan->jumlah_pengunjung) }}" min="1">
                    </div>

                    <div class="mb-3">
                        <label for="catatan_tambahan" class="form-label">Catatan Tambahan</label>
                        <textarea class="form-control" id="catatan_tambahan" name="catatan_tambahan" rows="3">{{ old('catatan_tambahan', $pesanan->catatan_tambahan) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $pesanan->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $pesanan->no_hp) }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $pesanan->status) }}">
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" class="form-control" id="total_harga" name="total_harga" value="{{ old('total_harga', $pesanan->total_harga) }}" step="0.01">
                    </div>

                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran (upload image)</label>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*">
                        @if($pesanan->bukti_pembayaran)
                            <img src="{{ asset('foto_bukti_pembayaran/' . $pesanan->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="150" class="mt-2">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('tabel_pesanan') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
