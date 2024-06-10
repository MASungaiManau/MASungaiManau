@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
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
                    <form action="{{ route('slider.update', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12 mb-3">
                                <label for=""><b>Slider 1</b></label>
                                <textarea name="slider" id="elm1" cols="30" rows="10">{!! $data->slider !!}</textarea>
                            </div>
                            <div class="col-md-12 col-12 mb-3">
                                <label for=""><b>Slider 2</b></label>
                                <textarea name="slider2" id="elm2" cols="30" rows="10">{!! $data->slider2 !!}</textarea>
                            </div>
                            <div class="col-md-12 col-12 mb-3">
                                <label for=""><b>Slider 3</b></label>
                                <textarea name="slider3" id="elm3" cols="30" rows="10">{!! $data->slider3 !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12" style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
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
@endsection
