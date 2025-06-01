@extends('layout.v_tamplate')

@section('content')
<div class="konten-body-container">
    <div class="konten-header">Kesenian Kampung Adat Banceuy</div>

    <div class="konten-container-content">
        <!-- Celempung -->
        <h2>Celempung</h2>
        <div class="konten-kaulinan-container">
            <div class="konten-text-box">
                <p>Deskripsi Celempung dapat ditambahkan di sini.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/celempung.jpg') }}" alt="Celempung">
            </div>
        </div>

        <!-- Gemyung -->
        <h2>Gemyung</h2>
        <div class="konten-kaulinan-container konten-reverse">
            <div class="konten-text-box">
                <p>Deskripsi Gemyung dapat ditambahkan di sini.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/gemyung.jpg') }}" alt="Gemyung">
            </div>
        </div>

        <!-- Dogdog -->
        <h2>Dogdog</h2>
        <div class="konten-kaulinan-container">
            <div class="konten-text-box">
                <p>Deskripsi Dogdog dapat ditambahkan di sini.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/dogdog.jpg') }}" alt="Dogdog">
            </div>
        </div>

        <!-- Rengkong -->
        <h2>Rengkong</h2>
        <div class="konten-kaulinan-container konten-reverse">
            <div class="konten-text-box">
                <p>Deskripsi Rengkong dapat ditambahkan di sini.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/rengkong.jpg') }}" alt="Rengkong">
            </div>
        </div>

        <!-- Durkeung -->
        <h2>Durkeung</h2>
        <div class="konten-kaulinan-container">
            <div class="konten-text-box">
                <p>Deskripsi Durkeung dapat ditambahkan di sini.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/durkeung.jpg') }}" alt="Durkeung">
            </div>
        </div>

        <!-- Tutunggulan -->
        <h2>Tutunggulan</h2>
        <div class="konten-kaulinan-container konten-reverse">
            <div class="konten-text-box">
                <p>Deskripsi Tutunggulan dapat ditambahkan di sini.</p>
            </div>
            <div class="konten-image-box">
                <img src="{{ asset('assets/images/tutunggulan.jpg') }}" alt="Tutunggulan">
            </div>
        </div>
    </div>
</div>
@endsection
