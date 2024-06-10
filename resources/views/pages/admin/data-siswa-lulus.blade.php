@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Siswa Lulus</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Siswa Lulus</li>
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
                    <div class="row mb-3">
                        <div class="col-md-12 col-12">
                            <a href="{{ route('siswaLulus.formAdd') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                                <i class="mdi mdi-account-multiple-plus font-size-16 align-middle me-2"></i>
                                Add New
                            </a>
                        </div>
                    </div>
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
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $no => $s)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $s->siswa->no_pendaftaran }}</td>
                                    <td>{{ $s->siswa->nama }}</td>
                                    <td>{{ $s->siswa->asal_sekolah }}</td>
                                    <td>{{ $s->siswa->no_telp }}</td>
                                    <td>
                                        <span class="badge badge-soft-success font-size-12">
                                            {{ $s->status }}
                                        </span>
                                    </td>
                                    <td>{{ $s->keterangan }}</td>
                                    <td>
                                        <ul class="d-flex list-inline mb-0">                                         
                                            <li class="list-inline-item">
                                                <a href="{{ route('siswaLulus.delete', $s->id) }}"
                                                    class="btn btn-danger p-0 avatar-xs d-block rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="fas fa-trash"></i>
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
