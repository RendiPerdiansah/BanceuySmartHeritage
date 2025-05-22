@extends('layout.v_dashboard_tamplate')

@section('content')
<section class="mb-8">
  <div class="container-fluid mt-4">
      <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h4 class="card-title">Data Buku Kunjungan</h4>
              
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th>ID Transaksi</th>
                          <th>Nama Pengunjung</th>
                          <th>Jumlah Pembayaran</th>
                          <th>Status</th>
                          <th>Tanggal Pembayaran</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>INV123456</td>
                          <td>Rudi Hartono</td>
                          <td>Rp 350.000</td>
                          <td><span class="badge bg-success">Berhasil</span></td>
                          <td>08 Mei 2025</td>
                          <td>
                            <a href="/admin/pembayaran/INV123456" class="btn btn-sm btn-primary">Detail</a>
                          </td>
                        </tr>
                        <tr>
                          <td>INV123457</td>
                          <td>Ani Susanti</td>
                          <td>Rp 500.000</td>
                          <td><span class="badge bg-warning text-dark">Pending</span></td>
                          <td>08 Mei 2025</td>
                          <td>
                            <a href="/admin/pembayaran/INV123457" class="btn btn-sm btn-primary">Detail</a>
                          </td>
                        </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection