@extends('layout.v_dashboard_tamplate')

@section('content')
<div class="container">
    <h2>Detail Akun</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(isset($akun))
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td>{{ $akun->nama }}</td>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{ $akun->username }}</td>
            </tr>
        </table>
        <a href="{{ route('tabel_akun') }}" class="btn btn-primary">Kembali ke Tabel Akun</a>
    @else
        <p>Akun tidak ditemukan.</p>
    @endif
</div>
@endsection