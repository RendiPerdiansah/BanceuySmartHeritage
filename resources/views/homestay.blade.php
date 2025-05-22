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
                <!-- Destinasi 1 -->
                <div class="destination-card">
                    <img src="{{ url('assets/images/homestayy.jpg') }}" alt="Destinasi 1">
                    <h3>Homestay (A)</h3>
                    
                    <a href="{{ url('detail_homestay_A') }}" class="detail-button">Detail</a>
                </div>
                
                <!-- Destinasi 2 -->
                <div class="destination-card">
                    <img src="{{ url('assets/images/homestay1.jpg') }}" alt="Destinasi 2">
                    <h3>Homestay (B)</h3>
                    
                    <a href="detail_homestay_B" class="detail-button">Detail</a>
                </div>

                <!-- Destinasi 3 -->
                <div class="destination-card">
                    <img src="{{ url('assets/images/homestay1.jpg') }}" alt="Destinasi 3">
                    <h3>Homestay (C)</h3>
                    
                    <a href="detail_homestay_C" class="detail-button">Detail</a>
                </div>

                <!-- Destinasi 4 -->
                <div class="destination-card">
                    <img src="{{ url('assets/images/homestayy.jpg') }}" alt="Destinasi 4">
                    <h3>Homestay (D)</h3>
                    
                    <a href="detail_homestay_D" class="detail-button">Detail</a>
                </div>
            </div>
        </div>

    <div class="footer">
        © 2023 Kampung Adat. Semua hak dilindungi.
    </div>

</body>
</html>
