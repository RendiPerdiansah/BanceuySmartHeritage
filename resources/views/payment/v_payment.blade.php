@extends('layout.v_dashboard_tamplate')

@section('content')
<div class="container mt-4">
    <h4>Daftar Transaksi Pemesanan Paket Belum Dibayar</h4>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Pengunjung</th>
        <th>No Telepon</th>
        <th>Alamat</th>
        <th>Tanggal Kunjungan</th>
        <th>Jumlah Pengunjung</th>
        <th>Nama Paket</th>
        <th>Total Harga</th>
        <th>Status</th>
        <th>Bukti Pembayaran</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse($unpaidOrders as $index => $order)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $order->nama_pengunjung }}</td>
        <td>{{ $order->no_hp }}</td>
        <td>{{ $order->alamat }}</td>
        <td>{{ $order->tanggal_kunjungan }}</td>
        <td>{{ $order->jumlah_pengunjung }}</td>
        <td>{{ $order->nama_paket }}</td>
        <td>Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
        <td>{{ $order->status }}</td>
        <td>
            @if($order->bukti_pembayaran)
                <img src="{{ asset('foto_bukti_pembayaran/' . $order->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
            @else
                <span class="text-muted">Belum ada</span>
            @endif
        </td>
        <td>
            <a href="{{ url('/payment/' . $order->order_id . '/pay') }}" class="btn btn-primary btn-sm">Bayar</a>
            @if(auth('akun')->user() && auth('akun')->user()->level == 1)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal{{ $order->id }}">
                Upload Bukti
            </button>

            <!-- Modal -->
            <div class="modal fade" id="uploadModal{{ $order->id }}" tabindex="-1" aria-labelledby="uploadModalLabel{{ $order->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{ route('payment.uploadProof') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="uploadModalLabel{{ $order->id }}">Upload Bukti Pembayaran</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id_pesanan" value="{{ $order->id_pesanan }}">
                      <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Pilih Foto Bukti Pembayaran</label>
                        <input class="form-control" type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Unggah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="11" class="text-center">Tidak ada transaksi belum dibayar.</td>
    </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
@endsection
