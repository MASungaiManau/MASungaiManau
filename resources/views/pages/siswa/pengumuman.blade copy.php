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
                    <div class="timeline-item">
                        <div class="timeline-block">
                            <div class="timeline-box card">
                                <div class="card-body">
                                    <span class="timeline-icon fw-bold text-primary">{{ $no + 1 }}</span>
                                    <div class="timeline-date">
                                        {{ tglIndo($p->tanggal) }}
                                        
                                    </div>
                                    <h5 class="mt-3 foont-size-15 text-center"> {{ $p->status }} </h5>
                                    <div class="text-muted text-center">
                                        <p class="mb-0">{{ $p->keterangan }}</p>
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
