<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('siswaHome') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('siswaPengumuman') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('formulir') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Formulir</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('berkas') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Upload Berkas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kartuPendaftaran') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Kartu Pendaftaran</span>
                    </a>
                </li>
                @if (Auth::user()->status == 'Diterima')
                    <li>
                        <a href="{{ route('daftarUlang') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span class="badge rounded-pill bg-danger float-end">Wajib</span>
                            <span>Daftar Ulang</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('pembayaran') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Pembayaran</span>
                        </a>
                    </li> --}}
                @endif
            </ul>
        </div>
    </div>
</div>
