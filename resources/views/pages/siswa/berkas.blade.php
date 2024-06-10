@extends('layout.app.app-siswa')
@section('siswa')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Pendaftar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pendaftar</li>
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
                    <form action="{{ route('berkas.updateSkl', $berkas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Surat Keterangan Lulus</b></label>
                            </div>
                            <div class="col-md-7 col-12 mb-2">
                                <input type="file" name="skl" class="form-control" required>
                            </div>
                            <div class="col-md-2 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($berkas->skl)
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#skl{{ $berkas->id }}">View</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('berkas.updateIjazahSd', $berkas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Iajazah SD/MI</b></label>
                            </div>
                            <div class="col-md-7 col-12 mb-2">
                                <input type="file" name="ijazah_sd" class="form-control" required>
                            </div>
                            <div class="col-md-2 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($berkas->ijazah_sd)
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#ijazahSd{{ $berkas->id }}">View</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    {{-- <form action="{{ route('berkas.updateIjazahSmp', $berkas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Iajazah SMP/MTS</b></label>
                            </div>
                            <div class="col-md-7 col-12 mb-2">
                                <input type="file" name="ijazah_smp" class="form-control" required>
                            </div>
                            <div class="col-md-2 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($berkas->ijazah_smp)
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#ijazahSmp{{ $berkas->id }}">View</a>
                                @endif
                            </div>
                        </div>
                    </form> --}}
                    <form action="{{ route('berkas.updateKk', $berkas->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Kartu Keluarga</b></label>
                            </div>
                            <div class="col-md-7 col-12 mb-2">
                                <input type="file" name="kk" class="form-control" required>
                            </div>
                            <div class="col-md-2 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($berkas->kk)
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#kk{{ $berkas->id }}">View</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('berkas.updatePasfoto', $berkas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Pasfoto</b></label>
                            </div>
                            <div class="col-md-7 col-12 mb-2">
                                <input type="file" name="pasfoto" class="form-control" required>
                            </div>
                            <div class="col-md-2 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($berkas->pasfoto)
                                    <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#pasfoto{{ $berkas->id }}">View</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('berkas.updateAkta', $berkas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Akta Kelahiran</b></label>
                            </div>
                            <div class="col-md-7 col-12 mb-2">
                                <input type="file" name="akta" class="form-control" required>
                            </div>
                            <div class="col-md-2 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($berkas->akte)
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#akta{{ $berkas->id }}">View</button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('berkas.updateLainnya', $berkas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Kartu BSM, PKH, KIS, KKS, KIP</b></label>
                            </div>
                            <div class="col-md-7 col-12 mb-2">
                                <input type="file" name="lainnya" class="form-control" required>
                            </div>
                            <div class="col-md-2 col-12 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                @if ($berkas->lainnya)
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#lainnya{{ $berkas->id }}">View</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Surat Keterangan Lulus --}}
    <div id="skl{{ $berkas->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Surat Keterangan Lulus
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/' . $berkas->skl) }}" type="application/pdf" width="100%"
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
    {{-- Ijazah SD/MI --}}
    <div id="ijazahSd{{ $berkas->id }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Ijazah SD/MI
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/' . $berkas->ijazah_sd) }}" type="application/pdf" width="100%"
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
    {{-- Ijazah SMP/MTS --}}
    {{-- <div id="ijazahSmp{{ $berkas->id }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Ijazah SMP/MTS
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/' . $berkas->ijazah_smp) }}" type="application/pdf"
                                width="100%" height="600px" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Kartu Keluarga --}}
    <div id="kk{{ $berkas->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Kartu Keluarga
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/' . $berkas->kk) }}" type="application/pdf" width="100%"
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
    {{-- Pasfoto --}}
    <div id="pasfoto{{ $berkas->id }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Pasfoto
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/' . $berkas->pasfoto) }}" type="application/pdf" width="100%"
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
    {{-- Akta Kelahiran --}}
    <div id="akta{{ $berkas->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Akta Kelahiran
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/' . $berkas->akte) }}" type="application/pdf" width="100%"
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
    {{-- Lainnya --}}
    <div id="lainnya{{ $berkas->id }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Kartu BSM, PKH, KIS, KKS, KIP
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <embed src="{{ asset('berkas/' . $berkas->lainnya) }}" type="application/pdf" width="100%"
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
@endsection
