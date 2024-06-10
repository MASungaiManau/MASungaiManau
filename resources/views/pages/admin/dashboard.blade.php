@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>
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
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-4">
                                <div class="d-flex">
                                    <div class="flex-1">

                                        <h3 class="mb-3"><span class="counter_value" data-target="{{ $jumlahPendaftar }}">{{ $jumlahPendaftar }}</span>
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            Daily</p>
                                    </div>
                                </div>
                                <h5 class="text-muted font-size-14 mb-0">Jumlah Pendaftar</h5>
                            </div>                          
                        </div>
                    </div>
                </div>               
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-4">
                                <div class="d-flex">
                                    <div class="flex-1">

                                        <h3 class="mb-3"><span class="counter_value" data-target="{{ $siswaDiverifikasi }}">{{ $siswaDiverifikasi }}</span>
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            Daily</p>
                                    </div>
                                </div>
                                <h5 class="text-muted font-size-14 mb-0">Diverifikasi</h5>
                            </div>                          
                        </div>
                    </div>
                </div>               
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-4">
                                <div class="d-flex">
                                    <div class="flex-1">

                                        <h3 class="mb-3"><span class="counter_value" data-target="{{ $siswaDiterima }}">{{ $siswaDiterima }}</span>
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            Daily</p>
                                    </div>
                                </div>
                                <h5 class="text-muted font-size-14 mb-0">Siswa Diterima</h5>
                            </div>                          
                        </div>
                    </div>
                </div>               
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-4">
                                <div class="d-flex">
                                    <div class="flex-1">

                                        <h3 class="mb-3"><span class="counter_value" data-target="{{ $siswaDitolak }}">{{ $siswaDitolak }}</span>
                                        </h3>
                                    </div>
                                    <div class="">
                                        <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                            Daily</p>
                                    </div>
                                </div>
                                <h5 class="text-muted font-size-14 mb-0">Siswa Ditolak</h5>
                            </div>                          
                        </div>
                    </div>
                </div>               
            </div>           
        </div>      
    </div>
@endsection
