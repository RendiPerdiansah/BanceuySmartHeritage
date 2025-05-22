@extends('layout.v_dashboard_tamplate') 

@section('content')

    <!-- Section: Kelola homestay -->
    <section class="mb-8">
        <div class="container-fluid mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Tabel Kelola Homestay</h4>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pemesan</th>
                                    <th>Nama Homestay</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal check in</th>
                                    <th>Tanggal check out</th>
                                    <th>Jumlah Pengunjung</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @forelse($dataAkun as $index => $akun)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $akun->nama }}</td>
                                    <td>{{ $akun->email }}</td>
                                    <td>{{ $akun->username }}</td>
                                    <td>{{ $akun->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data akun</td>
                                </tr>
                                @endforelse
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Kelola Ketersediaan -->
    <section>
      <h2 class="text-2xl font-semibold text-gray-700 mb-4">Kelola Ketersediaan Homestay</h2>

      <div class="bg-white rounded shadow p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="flex flex-col">
          <label for="tanggal" class="mb-1 text-sm text-gray-600">Tanggal Tidak Tersedia</label>
          <input type="date" id="tanggal" class="border px-4 py-2 rounded shadow-sm">
        </div>
        <div class="flex flex-col">
          <label for="jumlah_unit" class="mb-1 text-sm text-gray-600">Jumlah Unit Tersedia</label>
          <input type="number" id="jumlah_unit" class="border px-4 py-2 rounded shadow-sm" value="3">
        </div>
        <div class="flex items-end">
          <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
      </div>
    </section>



@endsection