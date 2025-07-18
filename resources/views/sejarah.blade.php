@extends('layout.v_tamplate')

@section('content')
<body id="page-top" style="background-color: rgb(189, 233, 239);">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/">Banceuy Smart Heritage</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="/paket_wisata">Pesan Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="/homestay">Pesan Homestay</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Content</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galery">Galery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    @php
                        $akun = Auth::guard('akun')->user();
                    @endphp

                    @if ($akun)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="akunDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $akun->nama ?? 'Profile' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="akunDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Lihat Profil</a></li>
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/buku_kunjungan">Buku Kunjungan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('akun.logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    

    <main class="container my-5">
        <h1 class="text-center mb-4">Sejarah Singkat Kampung Banceuy</h1>
        <p style="text-align: justify; font-size: 1.1rem; line-height: 1.6;">
            Sejarah Singkat Kampung Banceuy Awalnya Kampung Banceuy adalah Kampung Negla yang letaknya di sebelah timur laut dari Kampung Banceuy sekarang. Dari Kampung Banceuy hanya beberapa ratus meter, di Kampung Negla terdapat 7 keluarga, yaitu Eyang Ito, Aki Leutik, Eyang Malim, Aki Alman, Eyang Ono, Aki Uti, dan Aki Arsiam.
            <br><br>
            Dinamakan Kampung Negla, karena kampung tersebut berada di wilayah dataran tinggi dan terbuka (Neunggang jeung Lega). Sekitar tahun 1800 di Kampung Negla terjadi angin puting beliung yang memporakporandakan rumah-rumah penduduk, diantaranya rumah ke-7 kampung itu sehingga binatang ternak dan tumbuh-tumbuhan menjadi hancur. Setelah bencana alam reda, ke tujuh tokoh Kampung Negla itu ngabanceuy atau musyawarah untuk menangkal bencana alam tersebut. Sesuai dengan kesepakatan bersama, ke tujuh tokoh itu berusaha mendatangkan paranormal atau dukun. Paranormal yang dipercaya pada waktu itu adalah Eyang Suhab yang berasal dari kampung Ciupih Desa Pasanggrahan Kec. Kasomalang sekarang. Kemudian mereka melakukan penangkalan dengan cara numbal.
            <br><br>
            Berdasarkan pada hitungan penanggalan Jawa atau Wuku. Nama baru yang disepakati adalah Kampung Banceuy sebagai pengganti Kampung Negla, karena Negla diyakini sebagai nama yang menyebabkan bencana terhadap kampung dan penduduknya. Disamping itu, dengan perubahan nama kampung diharapkan penduduk akan hidup lebih baik dan diberkati seperti kata “BANCEUY”. Banceuy berarti musyawarah, para tokoh kampung berharap supaya kampung tersebut bisa dijadikan tempat berkumpul dan tempat bertukar pikiran pada saat itu maupun untuk masa yang akan datang. Maka peristiwa tersebut diperingati setiap akhir tahun dari tahun hijriah dan dikenal dengan istilah “Ruwatan Bumi”, atau masyarakat Banceuy lebih sering menyebutnya “Ngaruwat Bumi”.
        </p>
    </main>
</body>
@endsection
