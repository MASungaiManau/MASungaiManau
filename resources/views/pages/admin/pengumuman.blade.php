@extends('layout.app.app-admin')
@section('admin')
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
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Pengumuman</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $no => $p)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $p->tanggal }}</td>
                                    <td>{{ $p->judul }}</td>
                                    <td>{{ $p->pengumuman }}</td>
                                    <td>
                                        <select id="updateStatus" onchange="updateStatus({{ $p->id }});"
                                            class="form-control">
                                            <option value="Aktif" {{ $p->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                            </option>
                                            <option value="Tidak Aktif" {{ $p->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                                Tidak Aktif</option>
                                        </select>
                                    </td>
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
                                                <a href="{{ route('pengumuman.delete', $p->id) }}"
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
                                                <h5 class="modal-title mt-0" id="myModalLabel">Pengumuman
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('pengumuman.update', $p->id) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Tanggal</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="date" name="tanggal"
                                                                value="{{ $p->tanggal }}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Judul</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="text" name="judul"
                                                                value="{{ $p->judul }}" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Pengumuman</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <textarea name="pengumuman" rows="3" class="form-control" required>{{ $p->pengumuman }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                <form action="{{ route('pengumuman.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Tanggal</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Judul</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Pengumuman</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <textarea name="pengumuman" rows="3" class="form-control" required></textarea>
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

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        function updateStatus(id) {
            var status = $('#updateStatus').val();
            $.ajax({
                type: "get",
                url: "{{ route('pengumuman.ajax.updateStatus') }}",
                data: {
                    status,
                    id
                },
                dataType: "json",
                success: function(response) {

                }
            });
        }
    </script>
@endsection
