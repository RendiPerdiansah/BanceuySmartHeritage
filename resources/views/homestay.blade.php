<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homestay Kampung Adat Banceuy</title>
    <link rel="stylesheet" href="css/paket_wisata.css"> <!-- Memanggil file CSS -->
</head>
<body>

    <div class="header">Daftar Homestay Kampung Adat Banceuy</div>

        <div class="container">
            <h2>Homestay</h2>
            <div class="destinations">
                @foreach($homestays as $homestay)
                <div class="destination-card">
                    <img src="{{ url('foto_homestay/' . $homestay->foto_homestay) }}" alt="{{ $homestay->nama_homestay }}">
                    <h3>{{ $homestay->nama_homestay }}</h3>
                    <a href="{{ route('detail_homestay', ['id' => $homestay->id_homestay]) }}" class="detail-button">Detail</a>
                </div>
                @endforeach
            </div>
        </div>

    <div class="footer">
        © 2023 Kampung Adat. Semua hak dilindungi.
    </div>

</body>
</html>
