@extends('layout.app.app-siswa')
@section('siswa')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Kartu Pendaftaran</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Kartu Pendaftaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12 mx-auto" style="text-align: center;">
                            <img src="{{ asset('img/' . $data->foto) }}" alt=""
                                style="width: 150px; border-radius: 50%;">
                            <h6 class="mt-3">Status Pendaftaran</h6>
                            @php
                                if ($data->status == 'Diverifikasi') {
                                    $color = 'warning';
                                } elseif ($data->status == 'Diterima') {
                                    $color = 'success';
                                } elseif ($data->status == 'Ditolak') {
                                    $color = 'danger';
                                }
                            @endphp
                            <span class="badge bg-soft-{{ $color }} text-dark fw-bold font-size-12 mb-0">
                                {{ $data->status }}
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <label for=""><b>No. Pendaftaran</b></label>
                        </div>
                        <div class="col-md-9 col-12 mb-3">
                            <input type="text" value="{{ $data->no_pendaftaran }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <label for=""><b>NIK</b></label>
                        </div>
                        <div class="col-md-9 col-12 mb-3">
                            <input type="text" value="{{ $data->nik }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <label for=""><b>Nama Lengkap</b></label>
                        </div>
                        <div class="col-md-9 col-12 mb-3">
                            <input type="text" value="{{ $data->nama }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <label for=""><b>Tempat Lahir</b></label>
                        </div>
                        <div class="col-md-9 col-12 mb-3">
                            <input type="text" value="{{ $data->tempat_lahir }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <label for=""><b>Tanggal Lahir</b></label>
                        </div>
                        <div class="col-md-9 col-12 mb-3">
                            <input type="date" value="{{ $data->tgl_lahir }}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-12"></div>
                        <div class="col-md-9 col-12 mb-3">
                            <a href="{{ route('kartuPendaftaran.cetakKartuPendaftaran', $data->id) }}">
                                <p class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                    <i class="fas fa-cloud-download-alt"></i>
                                    Download Kartu Pendaftaran
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
