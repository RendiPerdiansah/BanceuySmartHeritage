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

        
    
        <div class="konten-container-content">
            <!-- Ruwatan Bumi-->
            <h2>Upacara Adat Ruwatan Bumi</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Ruwatan Bumi atau Ngaruwat Bumi berasal dari kata rawat atau 
ngarawat (bhs. Sunda) yang artinya mengumpulkan atau memelihara, 
secara umum memiliki makna yaitu mengumpulkan seluruh masyarakat 
serta mengumpulkan seluruh hasil bumi, baik bahan mentah, setengah 
jadi maupun yang sudah jadi.Tujuan dari Ngaruwat Bumi adalah ungkapan rasa syukur kepada 
Tuhan Yang Maha Esa atas segala yang telah diperoleh dari hasil bumi 
dan juga sebagai tolak bala serta ungkapan penghormatan kepada 
karuhun (leluhur).</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/Beranda.jpg') }}" alt="Ruwatan Bumi">
                </div>
            </div>
    
            <!-- Upacara Hajat Wawar -->
            <h2>Upacara Hajat Wawar</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Hajat Wawar merupakan salah satu acara adat yang biasa 
dilaksanakan di Kampung Adat Banceuy. Pengertian secara makna 
ialah suatu acara adat yang dilakukan oleh masing-masing lingkungan 
di setiap wilayah Kampung Adat Banceuy. Waktu pelaksanaan hajat 
wawar tidak ditentukan, tergantung dari kebutuhan wilayah masing
masing tetapi biasanya dilaksanakan paling sering 3 bulan sekali atau 
paling tidak 1 tahun sekali. Tujuan dari hajat wawar adalah sebagai 
tolak bala.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/tradisi1.jpg') }}" alt="hajat wawar">
                </div>
            </div>
    
            <!-- Hajat Mulud Aki Leutik -->
            <h2>Hajat Mulud Aki Leutik</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Hajat mulud Aki Leutik (nama asli: Raden Ismail Shaleh) 
merupakan hajat syukuran yang diselenggarakan khusus oleh keturunan 
keluarga Aki Leutik dengan tujuan meningkatkan rasa syukur dan 
memperingati hari kelahiran Nabi Muhammad SAW. Hajat ini biasa 
dilaksanakan setiap hari senin atau kamis pada minggu terakhir bulan 
mulud yang berlokasi di makam Aki Leutik.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/hajat_mulud.jpg') }}" alt="mulud aki leutik">
                </div>
            </div>
    
            <!-- Hajat Solokan -->
            <h2>Hajat Solokan</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Hajat 
solokan dilaksanakan 
pada pertengahan usia padi dengan 
tujuan 
wujud syukur &ngalap 
barokah agar saluran air berjalan 
lancar. Hajat ini dilaksanakan pada 3 
(tiga) saluran air (solokan), yaitu solokan Eyang Ito, solokan 
Cipadaringan, dan solokan Kolong Tembok.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/hajat_solokan.jpg') }}" alt="Hajat solokan">
                </div>
            </div>
    
            <!-- Mapag Cai (Ngabeungbat) -->
            <h2>Mapag Cai (Ngabeungbat)</h2>
            <div class="konten-kaulinan-container">
                <div class="konten-text-box">
                    <p>Mapag cai merupakan salah satu ritual adat yang dilaksanakan 
dengan cara membersihkan saluran irigasi solokan Cipadaringan 
sebagai saluran irigasi. Ritual ini dilatarbelakangi oleh pembagian 
aliran air pada Kampung Banceuy dan Desa Sanca.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/situs leluhur.jpg') }}" alt="mapag cai">
                </div>
            </div>
    
            <!-- Mitembeyan Tandur -->
            <h2>Mitembeyan Tandur</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Ritual ini merupakan ritual 
ketika akan melakukan tanam padi 
(mitembeyan) dengan tujuan agar 
padi yang ditanam akan tumbuh 
sumbur dan membuahkan hasil 
yang melimpah.Mitembeyan tandur 
dilakukan secara bersama-sama 
dengan pelaksanaan tandur</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/mitembeyan_tandur.jpg') }}" alt="Mitembeyan tandur">
                </div>
            </div>

            <h2>Upacara Khitanan/Naderan</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>merupakan 
kegiatan 
ritual keagamaan yang biasa 
dilakukan 
oleh 
warga 
banceuy dengan tujuan untuk 
mensucikan anak kecil laki
laki dan perempuan.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/budaya.jpg') }}" alt="Khitanan/Naderan">
                </div>
            </div>

            <h2>Hajat Puput Puseur</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>merupakan ritual syukuran yang biasa dilakukan oleh warga 
banceuy ketika terlepasnya tali pusar bayi. Kegiatan tersebut dilakukan 
biasanya setelah bayi berumur 7 atau 8 hari, dengan menggunakan 
kunyit sebagai antiseptik bagi bayi yang dibalurkan ke seluruh bagian 
pusar bayi.</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="puput puseur">
                </div>
            </div>

            <h2>Ngabangsar</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Kegiatan syukuran yang biasa dilakukan oleh warga banceuy 
ketika wanita hamil memasuki masa usia kehamilan 4 bulan atau 7 
bulan. Kegiatan ini dilakukan untuk mendoakan keselamatan bagi calon 
bayi, 
supaya pada saat dilahirkan diberikan kelancaran dan 
keselamatan, serta tidak kekurangan suatu apapun.</p>
                </div>
                <div class="konten-image-box">
                    <img src="{{ asset('assets/images/ngabangsar.jpg') }}" alt="ngabangsar">
                </div>
            </div>

            <h2>Hajat Saparan</h2>
            <div class="konten-kaulinan-container konten-reverse">
                <div class="konten-text-box">
                    <p>Hajat safaran adalah suatu upacara adat yang dilakukan tiap bulan 
safar. Upacara ini dilakukan oleh orang tua yang mempunyai anak lahir 
pada bulan safar. Upacara ini dilakukan bertujuan untuk memohon 
kepada Allah SWT, supaya anak tersebut terjauh dari marabahaya serta 
diberikan keselamatan, dan upacara ini juga sebagai tolak bala bagi 
anak tersebut.</p>
                </div>
                <div class="konten-image-box">
                    <img src="" alt="hajat saparan">
                </div>
            </div>
    
            
        </div>
    </div>
</section>
@endsection
