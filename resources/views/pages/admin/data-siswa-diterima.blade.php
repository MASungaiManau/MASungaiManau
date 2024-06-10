@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Siswa Diterima</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Siswa Diterima</li>
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
                                <th>Asal Sekolah</th>
                                <th>No. Telp</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $no => $s)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $s->no_pendaftaran }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->asal_sekolah }}</td>
                                    <td>{{ $s->no_telp }}</td>
                                    <td>
                                        <span class="badge badge-soft-success font-size-12">
                                            {{ $s->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <ul class="d-flex list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('siswaDiterima.detailSiswa', $s->id) }}" class="btn btn-info p-0 avatar-xs d-block rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- end li -->
                                            <li class="list-inline-item">
                                                <a href="{{ route('siswaDiterima.cancel', $s->id) }}"
                                                    class="btn btn-danger p-0 avatar-xs d-block rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="ri-close-line"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- end li -->
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
