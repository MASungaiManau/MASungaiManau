@extends('layout.app.app-siswa')
@section('siswa')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-4">
                                <div class="d-flex">
                                    <div class="flex-1">

                                        <h3 class="mb-3">
                                            Lengkapi Formulir
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            01
                                        </p>
                                    </div>
                                </div>
                                <h5 class="text-muted font-size-14 mb-0">
                                    <a href="{{ route('formulir') }}">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            <i class="mdi mdi-file-account-outline"></i>
                                            Lengkapi
                                        </p>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-4">
                                <div class="d-flex">
                                    <div class="flex-1">

                                        <h3 class="mb-3">
                                            Upload Berkas
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            02
                                        </p>
                                    </div>
                                </div>
                                <h5 class="text-muted font-size-14 mb-0">
                                    <a href="{{ route('berkas') }}">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            <i class="fas fa-upload"></i>
                                            Lengkapi
                                        </p>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-4">
                                <div class="d-flex">
                                    <div class="flex-1">

                                        <h3 class="mb-3">
                                            Daftar Ulang
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            03
                                        </p>
                                    </div>
                                </div>
                                <h5 class="text-muted font-size-14 mb-0">
                                    @if (Auth::user()->status == 'Diverifikasi')
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#konfirmasi">
                                            <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                                <i class="fas fa-eye"></i>
                                                Konfirmasi
                                            </p>
                                        </a>
                                    @elseif (Auth::user()->status == 'Diterima')
                                        <a href="{{ route('daftarUlang') }}">
                                            <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                                <i class="fas fa-eye"></i>
                                                Konfirmasi
                                            </p>
                                        </a>
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Konfirmasi --}}
    <div id="konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>
                        Maaf konfirmasi daftar ulang anda belum bisa dilakukan!
                    </h5>
                    <p>Status anda sedang diproses, silahkan lengkapi data anda!</p>
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
