<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->level == 'Admin')
                    <li>
                        <a href="{{ route('pengguna') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Data Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            {{-- <li><a href="ecommerce-products.html">Profile Lembaga</a></li> --}}
                            <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                            {{-- <li><a href="{{ route('biaya') }}">Data Biaya</a></li> --}}
                            <li><a href="{{ route('slider') }}">Slider</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Data PPDB</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('pendaftar') }}">Data Pendaftar</a></li>
                            <li><a href="{{ route('berkasSiswa') }}">Data Berkas</a></li>
                            <li><a href="{{ route('siswaDiterima') }}">Data Diterima</a></li>
                            <li><a href="{{ route('siswaDaftarUlang') }}">Data Daftar Ulang</a></li>
                            {{-- <li><a href="{{ route('pembayaranSiswa') }}">Data Pembayaran</a></li> --}}
                            <li><a href="{{ route('siswaDitolak') }}">Ditolak / Dicadangkan</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('siswaLulus') }}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Data Siswa Lulus</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('laporan') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Laporan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
