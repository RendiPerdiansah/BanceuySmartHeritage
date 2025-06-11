@extends('layout.v_tamplate')

@section('content')
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
        <div class="konten-header">Kaulinan Barudak</div>

        <div class="konten-container-content">
            <!-- Gusur Upih-->
            <h2>Gusur Upih</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit excepturi saepe praesentium nesciunt eius deserunt cum ratione iste ullam illo neque quaerat, quidem maiores necessitatibus. Officia explicabo dolor dolorem quis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Gusur Upih">
                </div>
            </div>
    
            <!-- Engkle -->
            <h2>Engkle</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda sequi aspernatur eius facilis a aliquam dignissimos sunt quam dolorum quia. Maiores, laboriosam optio aperiam repellat voluptas ut eaque quod quia.</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Engkle">
                </div>
            </div>
    
            <!-- Jajangkungan -->
            <h2>Jajangkungan</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil quam minima perferendis suscipit sint reprehenderit veniam delectus eligendi tenetur! Dolorum veniam ad aspernatur quae ut cumque harum suscipit quibusdam maxime!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Jajangkungan">
                </div>
            </div>
    
            <!-- Sorodot Gaplok -->
            <h2>Sorodot Gaplok</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem veritatis, atque sed sint quod quam temporibus. Molestias porro atque numquam provident possimus. Eaque modi vitae facilis eius, odio dicta officiis.</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Sorodot Gaplok">
                </div>
            </div>
    
            <!-- Gatrik  -->
            <h2>Gatrik </h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis fugit doloribus, ullam illum dolores esse doloremque voluptatum, obcaecati temporibus et ducimus provident numquam omnis assumenda explicabo tempora. Eius, similique reprehenderit?</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Gatrik">
                </div>
            </div>
    
           
            
        </div>
    </div>
</section>
@endsection
