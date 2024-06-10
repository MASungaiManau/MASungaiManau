@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Pengguna</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pengguna</li>
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
                            <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#addNew">
                                <i class="mdi mdi-account-multiple-plus font-size-16 align-middle me-2"></i>
                                Add New
                            </button>
                        </div>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>No. Telp</th>
                                <th>Level</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $no => $p)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->username }}</td>
                                    <td>{{ $p->no_telp }}</td>
                                    <td>{{ $p->level }}</td>
                                    <td>
                                        <ul class="d-flex list-inline mb-0">
                                            <li class="list-inline-item">
                                                <button type="button"
                                                    class="btn btn-warning p-0 avatar-xs d-block rounded-circle"
                                                    data-bs-toggle="modal" data-bs-target="#update{{ $p->id }}">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="mdi mdi-account-edit"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <!-- end li -->
                                            <li class="list-inline-item">
                                                <a href="{{ route('pengguna.delete', $p->id) }}"
                                                    class="btn btn-danger p-0 avatar-xs d-block rounded-circle">
                                                    <span class="avatar-title bg-transparent text-white">
                                                        <i class="mdi mdi-trash-can-outline"></i>
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- end li -->
                                        </ul>
                                    </td>
                                </tr>

                                <div id="update{{ $p->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Pengguna
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('pengguna.update', $p->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Nama</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="text" name="nama" value="{{ $p->nama }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Email</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="email" name="email"
                                                                value="{{ $p->email }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Username</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="text" name="username"
                                                                value="{{ $p->username }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>No. Telp</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="number" name="no_telp"
                                                                value="{{ $p->no_telp }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Level</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <select name="level" class="form-control">
                                                                <option value="Admin" {{ $p->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                                <option value="Kepala Sekolah" {{ $p->level == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Foto</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="file" name="foto" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Password</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="password" name="password"
                                                                placeholder="Masukkan password baru...."
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Add New --}}
    <div id="addNew" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Pengguna
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengguna.add') }}" method="post" enctype="multipart/form-data">
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
                                <label for=""><b>Level</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <select name="level" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Foto</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="file" name="foto" class="form-control">
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
