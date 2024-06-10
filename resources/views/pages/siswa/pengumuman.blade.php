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
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Pengumuman</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pengumuman</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="timeline">
                <div class="timeline-item timeline-left">
                    <div class="timeline-block">
                        <div class="time-show-btn mt-0">
                            <a href="#" class="btn btn-danger w-lg">PENGUMUMAN</a>
                        </div>
                    </div>
                </div>
                @foreach ($pengumuman as $no => $p)
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-md-12 col-12">
                                            <h6>ANDA DINYATAKAN {{ strtoupper($p->status) }} SELEKSI PENERIMAAN SISWA BARU</h6>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <P>{{ $p->keterangan }}</P>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
