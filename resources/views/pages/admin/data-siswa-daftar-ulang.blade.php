@extends('layout.app.app-admin')
@section('admin')
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
                <h4 class="mb-sm-0">Siswa Daftar Ulang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Ulang</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">                  
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>Tanggal Konfirmasi</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $no => $s)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $s->siswa->no_pendaftaran }}</td>
                                    <td>{{ $s->siswa->nama }}</td>
                                    <td>{{ tglIndo($s->tanggal) }}</td>
                                    <td>
                                        <span class="badge badge-soft-success font-size-12">
                                            {{ $s->status == 'true' ? 'Terkonfirmasi' : '' }}
                                        </span>
                                    </td>
                                    <td>
                                        <ul class="d-flex list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('siswaDiterima.detailSiswa', $s->siswa_id) }}"
                                                    class="btn btn-info p-0 avatar-xs d-block rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Siswa">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>   
@endsection
