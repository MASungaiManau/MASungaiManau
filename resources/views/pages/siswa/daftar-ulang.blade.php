@extends('layout.app.app-siswa')
@section('siswa')
    @php
        function tglIndo($tanggal)
        {
            $bulan = [
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ];

            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Daftar Ulang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Ulang</li>
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
                                </sp>
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
                    <div class="row mt-4">
                        @if ($cekDaftarUlang == 0)
                            <div class="col-md-12 col-12">
                                <p>
                                    Dengan Ini Saya Menyatakan dengan sebenar benarnya bahwa data yang saya kirim adalah
                                    benar
                                    dan sudah sesuai dengan berkas yang ada, dan saya bertanggung jawab atas semua data yang
                                    telah dikirim melalui aplikasi ini.
                                </p>
                            </div>
                            <div class="col-md-12 col-12 text-center mt-4">
                                <a href="{{ route('daftarUlang.konfirmasiData', $data->id) }}"
                                    class="btn btn-primary">Konfirmasi Data</a>
                            </div>
                        @else
                            <div class="col-md-12 col-12 mb-3">
                                <div class="">
                                    <div class="alert alert-success mb-0" role="alert">
                                        <h5 class="alert-heading font-size-16">Terimakasih!</h5>
                                        <p>Kamu telah berhasil daftar ulang pada tanggal <span
                                                class="badge bg-soft-danger text-dark fw-bold font-size-12 mb-0">{{ tglIndo($daftarUlang->tanggal) }}</span>
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card alert-success">
                                            <div class="card-body p-0">
                                                <div class="p-4">
                                                    <div class="d-flex">
                                                        <div class="flex-1">
                                                            <h5 class="mb-3">
                                                                Formulir
                                                            </h5>
                                                        </div>
                                                        <div class="">
                                                            <p
                                                                class="badge bg-soft-primary text-primary fw-bold font-size-12 mb-0">
                                                                01
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h5 class="text-muted font-size-14 mb-0">
                                                        <a href="{{ route('daftarUlang.download', $data->id) }}">
                                                            <p
                                                                class="badge bg-soft-info text-dark fw-bold font-size-12 mb-0">
                                                                <i class="fas fa-cloud-download-alt"></i>
                                                                Download
                                                            </p>
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
