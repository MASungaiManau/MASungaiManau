@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Berkas Siswa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Berkas</li>
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
                                <th>Surat Keterangan Lulus</th>
                                <th>Ijazah SD/MI</th>
                                {{-- <th>Ijazah SMP/MTS</th> --}}
                                <th>Pasfoto</th>
                                <th>Kartu Keluarga</th>
                                <th>Akta Kelahiran</th>
                                <th>Lainnya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berkas as $no => $b)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $b->siswa->no_pendaftaran }}</td>
                                    <td>{{ $b->siswa->nama }}</td>
                                    <td>                                        
                                        <button type="button" class="btn btn-success p-0 avatar-xs d-block rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#skl{{ $b->id }}">
                                            <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat SKL">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </button>
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-success p-0 avatar-xs d-block rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#ijazahSd{{ $b->id }}">
                                            <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Ijazah SD">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </button>
                                    </td>
                                    {{-- <td>                                        
                                        <button type="button" class="btn btn-success p-0 avatar-xs d-block rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#ijazahSmp{{ $b->id }}">
                                            <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Ijazah SMP">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </button>
                                    </td> --}}
                                    <td>                                        
                                        <button type="button" class="btn btn-success p-0 avatar-xs d-block rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#pasfoto{{ $b->id }}">
                                            <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Pasfoto">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </button>
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-success p-0 avatar-xs d-block rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#kk{{ $b->id }}">
                                            <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Kartu Keluarga">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </button>
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-success p-0 avatar-xs d-block rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#akta{{ $b->id }}">
                                            <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Akta Kelahiran">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </button>
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-success p-0 avatar-xs d-block rounded-circle"
                                            data-bs-toggle="modal" data-bs-target="#lainnya{{ $b->id }}">
                                            <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Ijazah">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </button>
                                    </td>                                  
                                </tr>

                                {{-- Surat Keterangan Lulus --}}
                                <div id="skl{{ $b->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Surat Keterangan Lulus
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <embed src="{{ asset('berkas/' . $b->skl) }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Ijazah SD --}}
                                <div id="ijazahSd{{ $b->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Ijazah SD/MI
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <embed src="{{ asset('berkas/' . $b->ijazah_sd) }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Ijazah SMP --}}
                                {{-- <div id="ijazahSmp{{ $b->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Ijazah SMP/MTS
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <embed src="{{ asset('berkas/' . $b->ijazah_smp) }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- Pasfoto --}}
                                <div id="pasfoto{{ $b->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Pasfoto
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <embed src="{{ asset('berkas/' . $b->pasfoto) }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Kartu Keluarga --}}
                                <div id="kk{{ $b->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Kartu Keluarga
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <embed src="{{ asset('berkas/' . $b->kk) }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Akta Keluarga --}}
                                <div id="akta{{ $b->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Akta Kelahiran
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <embed src="{{ asset('berkas/' . $b->akte) }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Lainnya --}}
                                <div id="lainnya{{ $b->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Lainnya
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <embed src="{{ asset('berkas/' . $b->lainnya) }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
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
@endsection
