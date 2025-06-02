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
        <div class="konten-header">Wisata Alam</div>

        <div class="konten-container-content">
            <!-- Leuwi Lawang-->
            <h2>Leuwi Lawang</h2>
            <div class="konten-wisata-container">
                <div class="konten-text-box">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit excepturi saepe praesentium nesciunt eius deserunt cum ratione iste ullam illo neque quaerat, quidem maiores necessitatibus. Officia explicabo dolor dolorem quis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/leuwi_lawang.jpg') }}" alt="Leuwi Lawang">
                </div>
            </div>
    
            <!-- Hutan Konservasi -->
            <h2>Hutan Konservasi</h2>
            <div class="konten-wisata-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda sequi aspernatur eius facilis a aliquam dignissimos sunt quam dolorum quia. Maiores, laboriosam optio aperiam repellat voluptas ut eaque quod quia.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/hutan_konservasi.jpg') }}" alt="Hutan Konservasi">
                </div>
            </div>
    
            <!-- Kebun Pinus Raden Suwada -->
            <h2>Kebun Pinus Raden Suwada</h2>
            <div class="konten-wisata-container">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil quam minima perferendis suscipit sint reprehenderit veniam delectus eligendi tenetur! Dolorum veniam ad aspernatur quae ut cumque harum suscipit quibusdam maxime!</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/Kebun_pinus.jpg') }}" alt="Kebun Pinus">
                </div>
            </div>
    
        </div>
    </div>
</section>
@endsection
