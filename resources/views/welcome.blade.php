@extends('layout.v_tamplate')


@section('content')
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Banceuy Smart Heritage</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        {{-- <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li> --}}
                        
                        <li class="nav-item"><a class="nav-link" href="#projects">Akses Informasi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#galery">Galery</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/paket_wisata">Pesan Paket</a></li>
                        <li class="nav-item"><a class="nav-link" href="/homestay">Pesan Homestay</a></li>
                        @php
    $akun = Auth::guard('akun')->user();
@endphp

@if ($akun)
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="akunDropdown" role="button" aria-haspopup="true"
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
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">SMART HERITAGE</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5" style="max-width: 600px; white-space: normal; word-wrap: break-word;">Selamat datang di website kampung adat banceuy.</h2>
                        <a class="btn btn-primary" href="#projects">Get Started</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Projects-->
        <section class="projects-section projects-bg-image" id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <!-- Project Two Row-->
                <div class="konten-container-content">
                    <div class="title">Informasi Kampung Adat Banceuy</div>
                    <div class="card-wrapper">
                        <div class="outer-box">
                            <div class="card-container">
                                <div class="card">
                                    <div class="img-content">
                                        <a href="/sejarah">
                                            <img src="assets/images/sejarah.jpg" alt="Sejarah Kampung Adat" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="heading">Sejarah</p>
                                        <p>Sejarah kampung adat banceuy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="outer-box">
                            <div class="card-container">
                                <div class="card">
                                    <div class="img-content">
                                        <a href="/budaya">
                                            <img src="assets/images/budaya.jpg" alt="Budaya Kampung Adat" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="heading">Budaya</p>
                                        <p>Budaya kampung adat banceuy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="outer-box">
                            <div class="card-container">
                                <div class="card">
                                    <div class="img-content">
                                        <a href="/makanan_khas">
                                        <img src="assets/images/opak.jpg" alt="Makanan Khas" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="heading">Makanan Khas</p>
                                        <p>Makanan Khas kampung adat banceuy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="outer-box">
                            <div class="card-container">
                                <div class="card">
                                    <div class="img-content">
                                        <a href="/kesenian">
                                        <img src="assets/images/kesenian.jpg" alt="Kesenian" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="heading">Kesenian</p>
                                        <p>Kesenian kampung adat banceuy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="outer-box">
                            <div class="card-container">
                                <div class="card">
                                    <div class="img-content">
                                        <a href="/kaulinan_barudak">
                                        <img src="assets/images/kaulinan.jpg" alt="Kaulinan Barudak" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="heading">Kaulinan Barudak</p>
                                        <p>Kaulinan Barudak kampung adat banceuy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="outer-box">
                            <div class="card-container">
                                <div class="card">
                                    <div class="img-content">
                                        <a href="/wisata_alam">
                                        <img src="assets/images/leuwi lawang.jpg" alt="Wisata Alam" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p class="heading">Wisata Alam</p>
                                        <p>Wisata Alam kampung adat banceuy</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        
                    </div>     
                </div>   
            </div> 
        </section>

        <!-- Galeri Kampung Adat Banceuy -->
<section class="py-5 bg-white" id="galery">
     <div class="container px-4 px-lg-5">
        <h2 class="title">Galeri Kampung Adat Banceuy</h2>
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <img src="assets/images/pemandangan.jpg" class="card-img-top" alt="Pemandangan Kampung">
                    <div class="card-body">
                        <h5 class="card-title">Pemandangan Alam</h5>
                        <p class="card-text">Suasana pagi di Kampung Banceuy yang asri dan alami.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <img src="assets/images/tradisi1.jpg" class="card-img-top" alt="Tradisi Adat">
                    <div class="card-body">
                        <h5 class="card-title">Tradisi Adat</h5>
                        <p class="card-text">Upacara adat yang diwariskan turun temurun oleh masyarakat Banceuy.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <img src="assets/images/wisata edukasi.jpg" class="card-img-top" alt="Wisata Alam">
                    <div class="card-body">
                        <h5 class="card-title">Wisata Edukasi</h5>
                        <p class="card-text">Wisata edukasi di Kampung Banceuy.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <img src="assets/images/kunjungan mahasiswa.jpg" class="card-img-top" alt="Wisata Alam">
                    <div class="card-body">
                        <h5 class="card-title">Kunjungan Mahasiswa</h5>
                        <p class="card-text">Kunjungan mahasiswa ke Kampung Adat Banceuy</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <img src="assets/images/saung pintar.jpg" class="card-img-top" alt="Wisata Alam">
                    <div class="card-body">
                        <h5 class="card-title">Saung Pintar</h5>
                        <p class="card-text">Panorama hutan, bukit, dan keasrian alam Kampung Adat Banceuy.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <img src="assets/images/situs leluhur.jpg" class="card-img-top" alt="Wisata Alam">
                    <div class="card-body">
                        <h5 class="card-title">Situs Leluhur</h5>
                        <p class="card-text">Panorama hutan, bukit, dan keasrian alam Kampung Adat Banceuy.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>

        <!-- Instagram Section -->
<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <a href="https://instagram.com/kampungadatbanceuy" target="_blank" style="text-decoration: none;">
                    <i class="fab fa-instagram fa-3x mb-3 text-white"></i>
                    <h2 class="text-white mb-4">Follow @kampungadatbanceuy di Instagram!</h2>
                </a>
            </div>
        </div>
    </div>
</section>

        <!-- Contact-->
       
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Smart Heritage : Sistem Informasi Digital Kampung Adat Banceuy 2025</div></footer>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
@endsection

