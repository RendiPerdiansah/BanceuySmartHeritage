@extends('layout.v_tamplate')

@section('content')
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
                <li class="nav-item"><a class="nav-link" href="/paket_wisata">Pesan Paket</a></li>
                <li class="nav-item"><a class="nav-link" href="/homestay">Pesan Homestay</a></li>
                <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
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

    <div class="konten-body-container">
        <div class="konten-header">Makanan Khas Kampung Adat</div>

        <div class="konten-container-content">
            <!-- Gula Aren -->
            <h2>Gula Aren</h2>
            <div class="konten-makanan-container">
                <div class="konten-text-box">
                    <p>Gula Aren adalah gula yang dibuat dari nira pohon aren. Memiliki rasa manis alami dan sering digunakan dalam makanan serta minuman tradisional.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/gula.jpg') }}" alt="Gula Aren">
                </div>
            </div>
    
            <!-- Kicimpring -->
            <h2>Kicimpring</h2>
            <div class="konten-makanan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Kicimpring adalah kerupuk khas Sunda yang terbuat dari singkong. Memiliki tekstur renyah dan rasa gurih yang khas.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/kicimpring.jpg') }}" alt="Kicimpring">
                </div>
            </div>
    
            <!-- Kue Satu -->
            <h2>Kue Satu</h2>
            <div class="konten-makanan-container">
                <div class="konten-text-box">
                    <p>Kue Satu merupakan kue kering berbahan dasar kacang hijau dan gula, memiliki tekstur yang rapuh dan rasa manis.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/kue_satu.jpg') }}" alt="Kue Satu">
                </div>
            </div>
    
            <!-- Opak -->
            <h2>Opak</h2>
            <div class="konten-makanan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Opak adalah makanan ringan berbentuk kerupuk yang dibuat dari tepung ketan dan dibakar hingga kering.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/opak.jpg') }}" alt="Opak">
                </div>
            </div>
    
            <!-- Rangginang Katumbiri -->
            <h2>Rangginang Katumbiri</h2>
            <div class="konten-makanan-container">
                <div class="konten-text-box">
                    <p>Rangginang Katumbiri adalah varian rangginang dengan warna-warni alami, biasanya dibuat dari beras ketan yang dikeringkan lalu digoreng.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/rangginang_katumbiri.jpg') }}" alt="Rangginang Katumbiri">
                </div>
            </div>
    
            <!-- Rangginang -->
            <h2>Rangginang</h2>
            <div class="konten-makanan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Rangginang merupakan kerupuk dari ketan yang dikeringkan dan digoreng, memiliki tekstur renyah dan rasa gurih.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/rangginang.jpg') }}" alt="Rangginang">
                </div>
            </div>
    
            <!-- Rangginging -->
            <h2>Rangginging</h2>
            <div class="konten-makanan-container">
                <div class="konten-text-box">
                    <p>Rangginging adalah salah satu varian rangginang dengan ukuran lebih kecil dan memiliki rasa yang lebih manis dibanding rangginang biasa.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/renggining.jpg') }}" alt="Rangginging">
                </div>
            </div>
    
            <!-- Sambal Papagan -->
            <h2>Sambal Papagan</h2>
            <div class="konten-makanan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Sambal Papagan adalah sambal khas Kampung Adat yang dibuat dari bahan-bahan alami dan memiliki rasa pedas yang menggugah selera.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/sambal_papagan.jpg') }}" alt="Sambal Papagan">
                </div>
            </div>
    
        </div>
    </div>
</section>
@endsection
