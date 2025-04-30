@extends('layout.v_tamplate')
    <div class="body-container">
        <div class="header">Wisata Alam</div>

        <div class="container-content">
            <!-- Leuwi Lawang-->
            <h2>Leuwi Lawang</h2>
            <div class="wisata-container">
                <div class="text-box">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit excepturi saepe praesentium nesciunt eius deserunt cum ratione iste ullam illo neque quaerat, quidem maiores necessitatibus. Officia explicabo dolor dolorem quis!</p>
                </div>
                <div class="image-box">
                    <img src="{{ asset('assets/images/leuwi_lawang.jpg') }}" alt="Leuwi Lawang">
                </div>
            </div>
    
            <!-- Hutan Konservasi -->
            <h2>Hutan Konservasi</h2>
            <div class="wisata-container reverse">
                <div class="text-box">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda sequi aspernatur eius facilis a aliquam dignissimos sunt quam dolorum quia. Maiores, laboriosam optio aperiam repellat voluptas ut eaque quod quia.</p>
                </div>
                <div class="image-box">
                    <img src="{{ asset('assets/images/hutan_konservasi.jpg') }}" alt="Hutan Konservasi">
                </div>
            </div>
    
            <!-- Kebun Pinus Raden Suwada -->
            <h2>Kebun Pinus Raden Suwada</h2>
            <div class="wisata-container">
                <div class="text-box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil quam minima perferendis suscipit sint reprehenderit veniam delectus eligendi tenetur! Dolorum veniam ad aspernatur quae ut cumque harum suscipit quibusdam maxime!</p>
                </div>
                <div class="image-box">
                    <img src="{{ asset('assets/images/Kebun_pinus.jpg') }}" alt="Kebun Pinus">
                </div>
            </div>
    
        </div>
    </div>
