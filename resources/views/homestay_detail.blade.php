<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail Homestay - {{ $homestay->name }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        header {
            background: linear-gradient(to right, #FF6F20, #FF2D20);
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            background-color: #FF2D20;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #FF6F20;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: white;
        }

        .facilities {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h1>{{ $homestay->name }}</h1>
    </header>

    <main class="container">
        <img src="{{ $homestay->image }}" alt="{{ $homestay->name }}" class="w-full h-48 object-cover rounded-lg">
        <p class="mt-2">{{ $homestay->description }}</p>

        <div class="facilities">
            <h2>Fasilitas</h2>
            <ul>
                <li>Wi-Fi Gratis</li>
                <li>Parkir Gratis</li>
                <li>AC</li>
                <li>Kolam Renang</li>
                <li>Ruang Makan</li>
            </ul>
        </div>

        <div class="price">
            <h2>Harga</h2>
            <p>Mulai dari: <strong>Rp. 500.000/malam</strong></p>
        </div>

        <a href="{{ url('/homestay') }}" class="cta-button">Kembali ke Homestay</a>
    </main>

    <footer>
        &copy; 2023 Kampung Adat. Semua hak dilindungi.
    </footer>
</body>

</html>
