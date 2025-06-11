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
    <div class="konten-header">Kesenian Kampung Adat Banceuy</div>

    <div class="konten-container-content">
        <!-- Celempung -->
        <h2>Celempung</h2>
        <div class="konten-kaulinan-container">
            <div class="konten-text-box">
                <p>Celempung merukan salahsatu 
kesenian yang berada di Kampung 
Adat Banceuy. Awal mula celempung 
di kampung adat banceuy menurut 
(alm) Bapak A. Rohendi, pada 
awalnya 
hanya 
merupakan 
ketidaksengajaan para penggembala 
ternak dan para petani ketika mengisi waktu luang di saung (pondok kecil 
tempat beristirahat dipinggir ladang atau sawah).</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/celempung.jpg') }}" alt="Celempung">
            </div>
        </div>

        <!-- Gemyung -->
        <h2>Gemyung</h2>
        <div class="konten-kaulinan-container konten-reverse">
            <div class="konten-text-box">
                <p>Gembyung merupakan kesenian 
buhun yang masih dipertahankan oleh 
masyarakat kampong adat banceuy. 
Gembyung terdiri dari dua kata yaitu 
gem yang memiliki arti ageman, dan 
Byung yang bermakna maha agung. 
Secara makna, gembyung merupakan sebuah seni persembahan yang 
dilakukan untuk memuji keagungan sang pencipta dan dengan dasar 
penyebaran agama islam disekitaran kampong adat banceuy.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/gembyung.jpg') }}" alt="Gemyung">
            </div>
        </div>

        <!-- Dogdog -->
        <h2>Dogdog</h2>
        <div class="konten-kaulinan-container">
            <div class="konten-text-box">
                <p>Pada umumnya dogdog digunakan 
sebagai alat muasik pada kesenian reog. 
Awalnya dogdog hanya digunakan sebagai 
alat pengalihperhatian untuk anak yang 
sedang dikhitan, agar anak tersebut tidak 
merasakan sakit ketika dikhitan. Kenapa 
demikian? Konon menurut cerita sesepuh, itu dimulai dari penyebaran 
agama islam.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/dogdog.jpg') }}" alt="Dogdog">
            </div>
        </div>

        <!-- Rengkong -->
        <h2>Rengkong</h2>
        <div class="konten-kaulinan-container konten-reverse">
            <div class="konten-text-box">
                <p>Rengkong adalah alat pikul padi dari sawah 
ke pelataran rumah. Rengkong terbuat daro 
beberapa ruas bambu besar (gombong), pada ruas 
ujung bambu tersebut dilubangi berukuran ± 1 cm 
dan pangjang sesuai dengan panjang ruasan bambu.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/rengkong.jpg') }}" alt="Rengkong">
            </div>
        </div>

        <!-- Durkeung -->
        <h2>Durkeung</h2>
        <div class="konten-kaulinan-container">
            <div class="konten-text-box">
                <p>Durkeung 
sebuah 
kesenian 
merupakan 
yang 
biasa 
ditampilakn disalah satu ritual 
nadran atau ritual khitanan yang 
didalamnya terdapat beberapa 
rangkaian upacara adat, dan 
salahsatunya memerlukan kesenian durkeung. Nama durkeung diambil 
dari suara alat musik yang ditabuh dalam kesenian ini, yaitu kata “dur” 
diambil dari suara bedug dan kata “Keung” diambil dari suara bendé.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/durkeung.jpg') }}" alt="Durkeung">
            </div>
        </div>

        <!-- Tutunggulan -->
        <h2>Tutunggulan</h2>
        <div class="konten-kaulinan-container konten-reverse">
            <div class="konten-text-box">
                <p>Tutunggulan pada awalnya hanya 
keisengan ibu-ibu yang sedang menumbuk 
padi disebuah alat yang bernama lisung. 
Untuk melepas penat katika menumbuk 
padi mereka memukul bagian pinggir dari 
badan lesung sehingga menimbulkan suara 
yang keras. Tutunggulan dilakukan sekurang-kurangnya 6 orang sebagai 
penabuh.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/tutungulan.jpg') }}" alt="Tutunggulan">
            </div>
        </div>
    </div>
</div>
@endsection
