@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Siswa Ditolak</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Siswa Ditolak</li>
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
                                        <span class="badge badge-soft-danger font-size-12">
                                            {{ $s->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <ul class="d-flex list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="{{ route('siswaDiterima.detailSiswa', $s->id) }}"
                                                    class="btn btn-info p-0 avatar-xs d-block rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- end li -->
                                            <li class="list-inline-item">
                                                <a href="{{ route('siswaDitolak.delete', $s->id) }}"
                                                    class="btn btn-danger p-0 avatar-xs d-block rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="fas fa-trash-alt"></i>
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

    {{-- Modal Add New --}}
    <div id="addNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Pengguna
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengguna.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Nama</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Email</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Username</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>No. Telp</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="number" name="no_telp" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Password</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
