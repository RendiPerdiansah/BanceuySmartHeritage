<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Wisata Kampung Adat</title>
    <link rel="stylesheet" href="css/paket_wisata.css"> <!-- Memanggil file CSS -->
</head>
<body>

    <div class="header">Paket Wisata Kampung Adat</div>

    <div class="container">
        <h2>Paket Wisata</h2>
        <div class="destinations">
            <!-- Destinasi 1 -->
            <div class="destination-card">
                <img src="{{ url('assets/images/paket_1ha.jpg') }}" alt="Destinasi 1">
                <h3>Paket 1 Hari (A)</h3>
                
                <a href="{{ url('detail_paket_1H_A') }}" class="detail-button">Detail</a>
            </div>
            
            <!-- Destinasi 2 -->
            <div class="destination-card">
                <img src="{{ url('assets/images/paket_1hb.jpg') }}" alt="Destinasi 2">
                <h3>Paket 1 Hari (B)</h3>
                
                <a href="detail_paket_1H_B" class="detail-button">Detail</a>
            </div>

            <!-- Destinasi 3 -->
            <div class="destination-card">
                <img src="{{ url('assets/images/paket_2h1m.jpg') }}" alt="Destinasi 3">
                <h3>Paket 2 Hari 1 Malam</h3>
                
                <a href="/detail_paket_2H_1M" class="detail-button">Detail</a>
            </div>

            <!-- Destinasi 4 -->
            <div class="destination-card">
                <img src="{{ url('assets/images/paket_3h2m.jpg') }}" alt="Destinasi 4">
                <h3>Paket 3 Hari 2 Malam</h3>
                
                <a href="/detail_paket_3H_2M" class="detail-button">Detail</a>
            </div>
        </div>
    </div>

    <div class="footer">
        © 2023 Kampung Adat. Semua hak dilindungi.
    </div>

</body>
</html>
