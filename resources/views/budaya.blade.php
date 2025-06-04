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
        <div class="konten-header">Budaya Kampung Adat Banceuy</div>

        <header class="text-center py-5"
        style="background: url('{{ asset('images/budaya.jpg')}}') no-repeat center center; background-size: cover; color: white;">
        <div class="overlay" style=" padding: 100px;">
            <h1 class="display-4"></h1>
        </div>
    </header>
    
        <div class="konten-container-content">
            <!-- Ruwatan Bumi-->
            <h2>Upacara Adat Ruwatan Bumi</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit excepturi saepe praesentium nesciunt eius deserunt cum ratione iste ullam illo neque quaerat, quidem maiores necessitatibus. Officia explicabo dolor dolorem quis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Ruwatan Bumi">
                </div>
            </div>
    
            <!-- Upacara Hajat Wawar -->
            <h2>Upacara Hajat Wawar</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda sequi aspernatur eius facilis a aliquam dignissimos sunt quam dolorum quia. Maiores, laboriosam optio aperiam repellat voluptas ut eaque quod quia.</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="hajat wawar">
                </div>
            </div>
    
            <!-- Hajat Mulud Aki Leutik -->
            <h2>Hajat Mulud Aki Leutik</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil quam minima perferendis suscipit sint reprehenderit veniam delectus eligendi tenetur! Dolorum veniam ad aspernatur quae ut cumque harum suscipit quibusdam maxime!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="mulud aki leutik">
                </div>
            </div>
    
            <!-- Hajat Solokan -->
            <h2>Hajat Solokan</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem veritatis, atque sed sint quod quam temporibus. Molestias porro atque numquam provident possimus. Eaque modi vitae facilis eius, odio dicta officiis.</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Hajat solokan">
                </div>
            </div>
    
            <!-- Mapag Cai (Ngabeungbat) -->
            <h2>Mapag Cai (Ngabeungbat)</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis fugit doloribus, ullam illum dolores esse doloremque voluptatum, obcaecati temporibus et ducimus provident numquam omnis assumenda explicabo tempora. Eius, similique reprehenderit?</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="mapag cai">
                </div>
            </div>
    
            <!-- Mitembeyan Tandur -->
            <h2>Mitembeyan Tandur</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore vero eos, id, veniam nam odio eligendi debitis doloremque laboriosam accusamus incidunt dignissimos possimus natus, at deserunt hic. Enim, alias debitis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Mitembeyan tandur">
                </div>
            </div>

            <h2>Upacara Khitanan/Naderan</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore vero eos, id, veniam nam odio eligendi debitis doloremque laboriosam accusamus incidunt dignissimos possimus natus, at deserunt hic. Enim, alias debitis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="Khitanan/Naderan">
                </div>
            </div>

            <h2>Hajat Puput Puseur</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore vero eos, id, veniam nam odio eligendi debitis doloremque laboriosam accusamus incidunt dignissimos possimus natus, at deserunt hic. Enim, alias debitis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="puput puseur">
                </div>
            </div>

            <h2>Ngabangsar</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore vero eos, id, veniam nam odio eligendi debitis doloremque laboriosam accusamus incidunt dignissimos possimus natus, at deserunt hic. Enim, alias debitis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="ngabangsar">
                </div>
            </div>

            <h2>Hajat Saparan</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore vero eos, id, veniam nam odio eligendi debitis doloremque laboriosam accusunt dignissimos possimus natus, at deserunt hic. Enim, alias debitis!</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="hajat saparan">
                </div>
            </div>
    
            
        </div>
    </div>
</section>
@endsection
