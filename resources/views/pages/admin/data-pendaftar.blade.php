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
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>No. Telp</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftar as $no => $p)
                                @php
                                    if ($p->status == 'Diverifikasi') {
                                        $color = 'warning';
                                    } elseif ($p->status == 'Diterima') {
                                        $color = 'success';
                                    } elseif ($p->status == 'Ditolak') {
                                        $color = 'danger';
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ tglIndo($p->tanggal) }}</td>
                                    <td><b>{{ $p->no_pendaftaran }}</b></td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->jk }}</td>
                                    <td>{{ $p->no_telp }}</td>
                                    <td>
                                        <span class="badge badge-soft-{{ $color }} font-size-12" data-bs-toggle="modal" data-bs-target="#updatStatus{{ $p->id }}">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <ul class="d-flex list-inline mb-0">
                                            <li class="list-inline-item">
                                                <button type="button"
                                                    class="btn btn-warning p-0 avatar-xs d-block rounded-circle"
                                                    data-bs-toggle="modal" data-bs-target="#update{{ $p->id }}">
                                                    <span class="avatar-title bg-transparent text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Status">
                                                        <i class="mdi mdi-account-edit"></i>
                                                    </span>
                                                </button>
                                            </li>
                                            <!-- end li -->
                                            <li class="list-inline-item">
                                                <a href="{{ route('pendaftar.delete', $p->id) }}"
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

                                {{-- Modal Udpdate Status --}}
                                <div id="update{{ $p->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="myModalLabel">Update Status
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('pendaftar.updateStatus', $p->id) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for=""><b>Status</b></label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <select name="status" class="form-control">
                                                                <option value="Diverifikasi" {{ $p->status == 'Diverifikasi' ? 'selected' : '' }}>
                                                                    Diverifikasi
                                                                </option>
                                                                <option value="Diterima" {{ $p->status == 'Diterima' ? 'selected' : '' }}>
                                                                    Diterima
                                                                </option>
                                                                <option value="Ditolak" {{ $p->status == 'Ditolak' ? 'selected' : '' }}>
                                                                    Ditolak
                                                                </option>
                                                            </select>
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
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>   
@endsection
