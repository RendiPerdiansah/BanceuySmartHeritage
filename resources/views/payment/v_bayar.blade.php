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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>


</head>
<body>
    <div class="container">
        <h1 class="my-3">Coba payment</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset ('images/busi.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Detail pesanan</h5>
              <table>
                <tr>
                    <td>name</td>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>{{ $order->no_hp }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $order->alamat }}</td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td>{{ $order->qty }}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td> : {{ $order->total_harga }}</td>
                </tr>
              </table>
              <button class="btn btn-primary mt-3" id="pay-button">Bayar</button>

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
                window.location.href = '/payment/succes?orderId={{ $orderId }}';
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
