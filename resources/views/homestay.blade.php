<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homestay Kampung Adat</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f4f4f4;
            /* Warna latar belakang yang lembut */
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

        h2 {
            font-size: 1.5rem;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            text-align: center;
        }

        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .section img {
            width: 100%;
            height: 150px;
            object-fit: cover;
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
    </style>
</head>

<body>
    <header>
        <h1>Homestay di Kampung Adat</h1>
        <p>Rasakan pengalaman tinggal di tengah budaya kami</p>
    </header>

    <main class="container">
        <div class="grid gap-6 lg:grid-cols-3">
            @foreach ($homestays as $homestay)
                <div class="section p-5">
                    <h2>{{ $homestay->name }}</h2>
                    <img src="{{ $homestay->image }}" alt="{{ $homestay->name }}">
                    <p class="mt-2">{{ Str::limit($homestay->description, 100) }}</p>
                    <a href="{{ url('/homestay/' . $homestay->id) }}" class="cta-button">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </main>

    <footer>
        &copy; 2023 Kampung Adat. Semua hak dilindungi.
    </footer>
</body>

</html>
