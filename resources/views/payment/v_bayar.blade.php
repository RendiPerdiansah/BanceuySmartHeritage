<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
        src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config ('midtrans.client_key') }}">
    </script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/payment_custom.css') }}" rel="stylesheet" />
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <div class="container">
        
        <div class="card">
            <img src="{{ isset($paket) ? asset('foto_paket/' . $paket->foto_paket) : asset('assets/images/paket_1ha.jpg') }}" class="card-img-top" alt="{{ $paket->nama_paket ?? 'Paket' }}">
            <div class="card-body">
              <h5 class="card-title">Detail pesanan</h5>
              <table>
                <tr>
                    <td>nama paket</td>
                    <td>{{ $pesanan->nama_paket }}</td>
                </tr>
                <tr>
                    <td>nama pemesan</td>
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
                    <td>Jumlah Pengunjung</td>
                    <td>{{ $pesanan->jumlah_pengunjung }} Orang</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td> : Rp{{ number_format($pesanan->total_harga ?? 0, 0, ',', '.') }}</td>
                </tr>
              </table>
              <button class="btn btn-primary mt-3" id="pay-button">Bayar</button>
              <button class="btn btn-secondary mt-3" onclick="window.location.href='/paket_wisata'">Kembali</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                // Redirect to /payment/success with orderId as a query parameter
                window.location.href = '/';
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
