@extends('layout.v_dashboard_tamplate')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Profile</h2>
    <div class="card shadow-sm p-4 mb-4">
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Remove @method('PUT') to use POST method as defined in routes -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3 row">
                <label for="foto_profile" class="col-sm-3 col-form-label fw-bold">Foto Profile</label>
                <div class="col-sm-9">
                    @if ($user->foto_profile)
                        <img src="{{ route('profile.foto', ['id' => $user->id]) }}" alt="Foto Profile" class="img-thumbnail mb-2" style="max-width: 150px;">
                    @else
                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="Foto Profile" class="img-thumbnail mb-2" style="max-width: 150px;">
                    @endif
                    <input type="file" class="form-control" id="foto_profile" name="foto_profile" accept="image/*">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-3 col-form-label fw-bold">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label fw-bold">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="no_hp" class="col-sm-3 col-form-label fw-bold">No HP</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-3 col-form-label fw-bold">Alamat</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="status" class="col-sm-3 col-form-label fw-bold">Status</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $user->status) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary me-2">Update Profile</button>
                    <a href="{{ route('profile') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
