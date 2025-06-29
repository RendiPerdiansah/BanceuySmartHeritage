<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"
        src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config ('midtrans.client_key') }}">
    </script>
    <title>Payment Homestay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/payment_custom.css') }}" rel="stylesheet" />
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <img src="{{ isset($pesanan) ? asset('foto_homestay/' . $pesanan->foto_homestay) : asset('assets/images/homestay.jpg') }}" class="card-img-top" alt="{{ $pesanan->nama_homestay ?? 'Homestay' }}">
            <div class="card-body">
              <h5 class="card-title">Detail pesanan Homestay</h5>
              <table>
                <tr>
                    <td>Nama Homestay</td>
            <td>{{ $pesanan->nama_homestay ?? '' }}</td>
                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td>{{ $pesanan->nama_pengunjung }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>{{ $pesanan->no_hp }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $pesanan->alamat }}</td>
                </tr>
                <tr>
                    <td>Check In</td>
                    <td>{{ $pesanan->check_in }}</td>
                </tr>
                <tr>
                    <td>Check Out</td>
                    <td>{{ $pesanan->check_out }}</td>
                </tr>
                <tr>
                    <td>Lama Tinggal</td>
                    <td>{{ $pesanan->lama_tinggal }} Hari</td>
                </tr>
                <tr>
                    <td>Harga Homestay per Hari</td>
                    <td>Rp{{ number_format($pesanan->harga_homestay ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>Rp{{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</td>
                </tr>
              </table>
              <button class="btn btn-primary mt-3" id="pay-button">Bayar</button>
              <button class="btn btn-secondary mt-3" onclick="window.location.href='/homestay'">Kembali</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = '/welcome';
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran Anda!");
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                }
            });
        });
    </script>
</body>
</html>
