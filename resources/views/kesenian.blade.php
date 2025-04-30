<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alat Musik Tradisional Kampung Adat</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 20px;
            background: linear-gradient(to right, #FF2D20, #FF6F20);
            color: white;
            border-bottom: 4px solid #FF6F20;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        main {
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        p {
            line-height: 1.6;
            font-size: 1.1rem;
            margin: 15px 0;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Kesenian Kampung Adat Banceuy</h1>
    </header>
    <main>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <div class="section">
                        <h2><a href="{{ url('/sejarah') }}">Celempung</a></h2>
                    </div>
                    <div class="section">
                        <h2><a href="{{ url('/budaya') }}">Gemyung</a></h2>
                    </div>
                    <div class="section">
                        <h2><a href="{{ url('/tradisi') }}">Dogdog</a></h2>
                    </div>
                    <div class="section">
                        <h2><a href="{{ url('/makanan_khas') }}">Rengkong</a></h2>
                    </div>
                    <div class="section">
                        <h2><a href="{{ url('/makanan_khas') }}">Durkeung</a></h2>
                    </div>
                    <div class="section">
                        <h2><a href="{{ url('/makanan_khas') }}">Tutunggulan</a></h2>
                    </div>
    </div>
    </main>
    <footer>
        <p>&copy; 2023 Kampung Adat. Semua hak dilindungi.</p>
    </footer>
</body>

</html>
