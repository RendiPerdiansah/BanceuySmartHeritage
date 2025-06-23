<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="/" class="logo" style="display: flex; align-items: center; gap: 10px;">
            <img src="{{ asset('images/home.png') }}" alt="navbar brand" height="30" />
            <span class="text-white" style="font-size: 16px; font-weight: bold;">Smart Heritage</span>
        </a>
        
          <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
              </button>
          </div>
          <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
          </button>
      </div>
      <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
          <ul class="nav nav-secondary">
              <li class="nav-item active">
                  <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                      <i class="fas fa-home"></i>
                      <p>Dashboard</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="dashboard">
                      <ul class="nav nav-collapse">
                          <li>
                              <a href="{{ route('dashboard_admin') }}">
                                  <span class="sub-item">Dashboard</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              {{-- Update tanggal 07 april 2025 --}}
              <li class="nav-section">
                  <span class="sidebar-mini-icon">
                      <i class="fa fa-ellipsis-h"></i>
                  </span>
                  <h4 class="text-section">Tabel</h4>
              </li>
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#tabel">
                      <i class="fas fa-layer-group"></i>
                      <p>Tabel</p>
                      <span class="caret"></span>
                  </a>
                  <div class="collapse" id="tabel">
                      <ul class="nav nav-collapse">
                         @if(auth('akun')->check() && auth('akun')->user()->level == 1)
                          <li>
                              <a href="/tabel_akun">
                                  <span class="sub-item">Kelola User</span>
                              </a>
                          </li>
                          @endif
                          @if(auth('akun')->check() && auth('akun')->user()->level == 2)
                          <li>
                              <a href="/homestay-table">
                                  <span class="sub-item">Tabel Homestay</span>
                              </a>
                          </li>
                          @endif
                           @if(auth('akun')->check() && auth('akun')->user()->level == 1)
                          <li>
                              <a href="/tabel_pesanan">
                                  <span class="sub-item">Kelola Pesanan</span>
                              </a>
                          </li>
                            @endif
                            @if(auth('akun')->check() && auth('akun')->user()->level == 1)
                                <li>
                              <a href="/paket-table">
                                  <span class="sub-item">Tabel Paket</span>
                              </a>
                          </li>
                            @endif
                          
                          @if (auth('akun')->check() && auth('akun')->user()->level == 2)
                              <li>
                            <a href="/tabel_pesanan_homestay">
                                <span class="sub-item">Tabel pesanan Homestay</span>
                            </a>
                           </li>
                          @endif
                          
                            @if(auth('akun')->check() && auth('akun')->user()->level == 1)
                           <li>
                            <a href="/tabel_buku_kunjungan">
                                <span class="sub-item">Tabel kelola data pengunjung</span>
                            </a>
                        </li>
                        @endif

                        @if (auth('akun')->check() && auth('akun')->user()->level == 1)
                           <li>
                            <a href="/payment/unpaid">
                                <span class="sub-item">Hasil pembayaran</span>
                            </a>
                        </li> 
                        @endif
                        @if (auth('akun')->check() && auth('akun')->user()->level == 3)
                            <li>
                            <a href="/tabel_pesanan_pengunjung">
                                <span class="sub-item">Riwayat Pesanan</span>
                            </a>
                        </li> 
                        @endif
                         
                      </ul>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</div>
