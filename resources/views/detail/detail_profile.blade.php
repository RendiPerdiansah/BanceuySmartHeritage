@extends('layout.v_dashboard_tamplate')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Profile</h2>
    <div class="card shadow-sm p-4 mb-4">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Foto Profile</th>
                    <td>
                        @if ($user->foto_profile)
                            <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profile" class="img-thumbnail" style="max-width: 150px;">
                        @else
                            <img src="{{ asset('assets/img/profile.jpg') }}" alt="Foto Profile" class="img-thumbnail" style="max-width: 150px;">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $user->nama }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td>{{ $user->no_hp }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $user->alamat }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $user->status }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
@endsection
