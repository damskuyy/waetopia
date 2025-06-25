<aside class="left-sidebar sidebar-dark" id="left-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="/dashboard">
        <img src="{{ asset('be/images/logo-travel.png') }}" alt="Waetopia" style="margin-left: -10px;">
        <span class="brand-name" style="margin-left: 10px;"> WAETOPIA</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-left" data-simplebar style="height: 100%;">
      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
        {{-- {{ Request::is('dashboard') ? 'active' : '' } --}}
          <li class="section }">
            <a class="sidenav-item-link @if (!isset($menu)) active @endif" href="@if ($title === 'Admin'){{route('admin.index')}} @elseif($title === 'Bendahara'){{route('bendahara.index')}} @elseif($title === 'Pemilik'){{route('owner.index')}} @endif">
              <i class="mdi mdi-view-dashboard"></i>
              <span class="nav-text">Dashboard</span>
            </a>
          </li>
        
        @if ($title === 'Admin')
          <li class="section-title">
            Berita
          </li>

          <li class="section {{ Request::is('kategori_berita') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/kategori_berita">
              <i class="fas fa-filter"></i>
              <span class="nav-text">Kategori Berita</span>
            </a>
          </li>

          <li class="section {{ Request::is('berita') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="berita">
              <i class="mdi mdi-newspaper"></i>
              <span class="nav-text">Berita</span>
            </a>
          </li>

          <li class="section-title">
            Pengguna
          </li>

          <li class="section {{ Request::is('user') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/user">
              <i class="mdi mdi-account-group"></i>
              <span class="nav-text">Data User</span>
            </a>
          </li>

          <li class="section {{ Request::is('data_pelanggan') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/data_pelanggan">
              <i class="mdi mdi-account-tie"></i>
              <span class="nav-text"> Data Pelanggan</span>
            </a>
          </li>

          <li class="section {{ Request::is('data_karyawan') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/data_karyawan">
              <i class="mdi mdi-account-search"></i>
              <span class="nav-text">Data Karyawan</span>
            </a>
          </li>
        @endif
          

        @if ($title === 'Bendahara')
          <li class="section-title">
            Paket
          </li>

          <li class="section {{ Request::is('paket_wisata') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/paket_wisata">
              <i class="mdi mdi-wallet-travel"></i>
              <span class="nav-text">Paket Wisata</span>
            </a>
          </li>

          <li class="section {{ Request::is('kategori_wisata') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/kategori_wisata">
              <i class="fas fa-filter"></i>
              <span class="nav-text">Kategori Wisata</span>
            </a>
          </li>

          <li class="section {{ Request::is('obyek_wisata') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/obyek_wisata">
              <i class="mdi mdi-airplane"></i>
              <span class="nav-text">Obyek Wisata</span>
            </a>
          </li>

          <li class="section {{ Request::is('penginapan') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/penginapan">
              <i class="mdi mdi-home"></i>
              <span class="nav-text">Penginapan</span>
            </a>
          </li>

          <li class="section-title">
            Booking
          </li>

          <li class="section {{ Request::is('reservasi') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/reservasi">
              <i class="mdi mdi-bookmark-plus"></i>
              <span class="nav-text">Reservasi</span>
            </a>
          </li>

          <li class="section-title">
            Lainnya
          </li>

          <li class="section {{ Request::is('diskon') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/diskon">
              <i class="mdi mdi-tag"></i>
              <span class="nav-text">Diskon</span>
            </a>
          </li>

          <li class="section {{ Request::is('metode_pembayaran') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/metode_pembayaran">
              <i class="mdi mdi-cash"></i>
              <span class="nav-text">Metode Pembayaran</span>
            </a>
          </li>
        @endif

        @if ($title === 'Owner')
          <li class="section-title">
            Paket
          </li>

          <li class="section {{ Request::is('paket_wisata') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/paket_wisata">
              <i class="mdi mdi-wallet-travel"></i>
              <span class="nav-text">Paket Wisata</span>
            </a>
          </li>

          <li class="section {{ Request::is('kategori_wisata') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/kategori_wisata">
              <i class="fas fa-filter"></i>
              <span class="nav-text">Kategori Wisata</span>
            </a>
          </li>

          <li class="section {{ Request::is('obyek_wisata') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/obyek_wisata">
              <i class="mdi mdi-airplane"></i>
              <span class="nav-text">Obyek Wisata</span>
            </a>
          </li>

          <li class="section {{ Request::is('penginapan') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/penginapan">
              <i class="mdi mdi-home"></i>
              <span class="nav-text">Penginapan</span>
            </a>
          </li>

          <li class="section-title">
            Booking
          </li>

          <li class="section {{ Request::is('reservasi') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/reservasi">
              <i class="mdi mdi-bookmark-plus"></i>
              <span class="nav-text">Reservasi</span>
            </a>
          </li>

          <li class="section-title">
            Lainnya
          </li>

          <li class="section {{ Request::is('diskon') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/diskon">
              <i class="mdi mdi-tag"></i>
              <span class="nav-text">Diskon</span>
            </a>
          </li>

          <li class="section {{ Request::is('metode_pembayaran') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/metode_pembayaran">
              <i class="mdi mdi-cash"></i>
              <span class="nav-text">Metode Pembayaran</span>
            </a>
          </li>

          <li class="section-title">
            Berita
          </li>

          <li class="section {{ Request::is('kategori_berita') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/kategori_berita">
              <i class="fas fa-filter"></i>
              <span class="nav-text">Kategori Berita</span>
            </a>
          </li>

          <li class="section {{ Request::is('berita') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="berita">
              <i class="mdi mdi-newspaper"></i>
              <span class="nav-text">Berita</span>
            </a>
          </li>

          <li class="section-title">
            Pengguna
          </li>

          <li class="section {{ Request::is('user') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/user">
              <i class="mdi mdi-account-group"></i>
              <span class="nav-text">Data User</span>
            </a>
          </li>

          <li class="section {{ Request::is('data_pelanggan') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/data_pelanggan">
              <i class="mdi mdi-account-tie"></i>
              <span class="nav-text"> Data Pelanggan</span>
            </a>
          </li>

          <li class="section {{ Request::is('data_karyawan') ? 'active' : '' }}">
            <a class="sidenav-item-link" href="/data_karyawan">
              <i class="mdi mdi-account-search"></i>
              <span class="nav-text">Data Karyawan</span>
            </a>
          </li>
        @endif

      </ul>
    </div>

    <div class="sidebar-footer">
      <div class="sidebar-footer-content">
        <ul class="d-flex">
          <li>
            <a href="/settings" data-toggle="tooltip" title="Profile settings">
              <i class="mdi mdi-settings"></i>
            </a>
          </li>
          <li>
            <a href="#" data-toggle="tooltip" title="No chat messages">
              <i class="mdi mdi-chat-processing"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</aside>