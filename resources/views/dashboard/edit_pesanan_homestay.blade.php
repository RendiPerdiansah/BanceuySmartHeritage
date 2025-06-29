@extends('layout.v_dashboard_tamplate')

@section('content')
<section class="mb-8">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Pesanan Homestay</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tabel_pesanan_homestay.update', $pesanan->id_homestay) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_pengunjung" class="form-label">Nama Pengunjung</label>
                        <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" value="{{ old('nama_pengunjung', $pesanan->nama_pengunjung) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pesanan->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="lama_tinggal" class="form-label">Lama Tinggal (hari)</label>
                        <input type="number" class="form-control" id="lama_tinggal" name="lama_tinggal" value="{{ old('lama_tinggal', $pesanan->lama_tinggal) }}" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="check_in" class="form-label">Tanggal Check In</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" value="{{ old('check_in', $pesanan->check_in ? $pesanan->check_in->format('Y-m-d') : '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran (nama file)</label>
                        <input type="text" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" value="{{ old('bukti_pembayaran', $pesanan->bukti_pembayaran) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('tabel_pesanan_homestay') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
