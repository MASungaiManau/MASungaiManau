@php
    $sett = DB::table('settings')->get()->first();
@endphp
<div class="navbar-header" style="background-color: #03318C;">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('img/logo/' . $sett->logo) }}" alt="logo-sm-dark" style="width: 70px;">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('img/logo/' . $sett->logo) }}" alt="logo-dark" style="width: 70px;">
                </span>
            </a>

            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('img/logo/' . $sett->logo) }}" alt="logo-sm-light" style="width: 70px;">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('img/logo/' . $sett->logo) }}" alt="logo-light" style="width: 70px;">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
            <i class="ri-menu-2-line align-middle"></i>
        </button>

    </div>

    <div class="d-flex">

        <div class="dropdown d-inline-block user-dropdown">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user"
                    src="{{ Auth::user()->foto ? asset('img/' . Auth::user()->foto) : asset('assets/images/error.png') }}"
                    alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1 text-white">{{ Auth::user()->nama }}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="{{ route('formulir') }}"><i class="ri-user-line align-middle me-1"></i>
                    Profile</a>              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('siswa.logout') }}"><i
                        class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
            </div>
        </div>
        <!-- end user -->
    </div>
</div>
