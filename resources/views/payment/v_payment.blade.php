<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1 class="my-3">Coba payment</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset ('images/busi.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Busi</h5>
              <p class="card-text">Busi Super Iridium Plus</p>
              <form action="/bayar" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" name="qty" class="form-control" id="qty" placeholder="Jumlah Pesanan">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">name Pelanggan</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukan nama anda">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor telepon</label>
                    <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="Nomor HP">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                </div>



                <button type="submit" class="btn btn-primary">Bayar</button>
              </form>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
