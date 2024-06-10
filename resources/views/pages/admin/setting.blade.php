@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Setting</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Status Pendaftaran</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for=""><b>Status</b></label>
                            <select id="updateStatus" onchange="updateStatus({{ $data->id }});" class="form-control">
                                <option value="Dibuka" {{ $data->status_pendaftaran == 'Dibuka' ? 'selected' : '' }}>Dibuka
                                </option>
                                <option value="Ditutup" {{ $data->status_pendaftaran == 'Ditutup' ? 'selected' : '' }}>
                                    Ditutup</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Setting
                    </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('setting.updateNamaSekolah', $data->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Nama Sekolah</b></label>
                            </div>
                            <div class="col-md-5 col-12 mb-2">
                                <input type="text" name="nama_sekolah" value="{{ $data->nama_sekolah }}"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('setting.updateLogo', $data->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Logo Sekolah</b></label>
                            </div>
                            <div class="col-md-5 col-12 mb-2">
                                <input type="file" name="logo" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($data->logo)
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#logo{{ $data->id }}">View</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('setting.updateFormulir', $data->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Formulir Pendaftaran</b></label>
                            </div>
                            <div class="col-md-5 col-12 mb-2">
                                <input type="file" name="formulir" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($data->formulir)
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#formulir{{ $data->id }}">View</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Logo --}}
    <div id="logo{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Logo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('img/logo/' . $data->logo) }}" type="application/pdf" width="100%"
                                height="600px" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Formulir --}}
    <div id="formulir{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Formulir
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/formulir/' . $data->formulir) }}" type="application/pdf"
                                width="100%" height="600px" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        function updateStatus(id) {
            var status = $('#updateStatus').val();
            $.ajax({
                type: "get",
                url: "{{ route('setting.ajax.updateStatus') }}",
                data: {
                    id,
                    status
                },
                dataType: "json",
                success: function(pesan) {
                    alert(pesan)
                }
            });
        }
    </script>
@endsection
