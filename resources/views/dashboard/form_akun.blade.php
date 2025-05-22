@extends('layout.v_dashboard_tamplate')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ isset($akun) ? 'Edit Akun' : 'Tambah Akun' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($akun))
        <form action="{{ route('akun.update', $akun->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('akun.store') }}" method="POST">
    @endif
        @csrf

        <div class="mb-3 row">
            <label for="nama" class="col-sm-3 col-form-label fw-bold">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $akun->nama ?? '') }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label fw-bold">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $akun->email ?? '') }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="username" class="col-sm-3 col-form-label fw-bold">Username</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $akun->username ?? '') }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-3 col-form-label fw-bold">{{ isset($akun) ? 'New Password (leave blank to keep current)' : 'Password' }}</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password" {{ isset($akun) ? '' : 'required' }}>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="password_confirmation" class="col-sm-3 col-form-label fw-bold">Confirm Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" {{ isset($akun) ? '' : 'required' }}>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="no_hp" class="col-sm-3 col-form-label fw-bold">No HP</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $akun->no_hp ?? '') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="alamat" class="col-sm-3 col-form-label fw-bold">Alamat</label>
            <div class="col-sm-9">
                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $akun->alamat ?? '') }}</textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="status" class="col-sm-3 col-form-label fw-bold">Status</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $akun->status ?? '') }}">
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-primary">{{ isset($akun) ? 'Update' : 'Tambah' }}</button>
                <a href="{{ route('tabel_akun') }}" class="btn btn-secondary ms-2">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection
