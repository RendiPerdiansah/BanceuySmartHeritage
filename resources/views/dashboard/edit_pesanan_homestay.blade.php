@extends('layout.v_dashboard_tamplate')

@section('content')
<section class="mb-8">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Pesanan Homestay</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tabel_pesanan_homestay.update', $pesanan->id_pemesanan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_pengunjung" class="form-label">Nama Pengunjung</label>
                        <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" value="{{ old('nama_pengunjung', $pesanan->nama_pengunjung) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" readonly>{{ old('alamat', $pesanan->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="lama_tinggal" class="form-label">Lama Tinggal (hari)</label>
                        <input type="number" class="form-control" id="lama_tinggal" name="lama_tinggal" value="{{ old('lama_tinggal', $pesanan->lama_tinggal) }}" min="1" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="check_in" class="form-label">Tanggal Check In</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" value="{{ old('check_in', \Carbon\Carbon::parse($pesanan->check_in)->format('Y-m-d')) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_homestay" class="form-label">Nama Homestay</label>
                        <input type="text" class="form-control" id="nama_homestay" name="nama_homestay" value="{{ old('nama_homestay', $pesanan->nama_homestay) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="harga_homestay" class="form-label">Harga Homestay</label>
                        <input type="text" class="form-control" id="harga_homestay" name="harga_homestay" value="{{ old('harga_homestay', $pesanan->harga_homestay) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ old('total_harga', $pesanan->total_harga) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="check_out" class="form-label">Tanggal Check Out</label>
                        <input type="date" class="form-control" id="check_out" name="check_out" value="{{ old('check_out', \Carbon\Carbon::parse($pesanan->check_out)->format('Y-m-d')) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $pesanan->status) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran (upload image)</label>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*">
                        @if($pesanan->bukti_pembayaran)
                            <img src="{{ asset('foto_bukti_pembayaran/' . $pesanan->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="150" class="mt-2">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('tabel_pesanan_homestay') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
