@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Laporan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
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
                    <form action="{{ route('laporan.cetak') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-2 col-12">
                                <select name="status" id="statusSiswa" class="form-control form-control-sm">
                                    <option value="all">All</option>
                                    <option value="Diverifikasi">Diverifikasi</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>
                            <div class="col-md-10 col-12">
                                <a type="button" id="cari" class="btn btn-sm btn-primary waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#addNew">
                                    <i class="fas fa-search font-size-16 align-middle me-2"></i>
                                    Cari
                                </a>
                                <button type="submit" class="btn btn-sm btn-success waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#addNew">
                                    <i class="fas fa-print font-size-16 align-middle me-2"></i>
                                    Cetak
                                </button>
                            </div>
                        </div>
                    </form>
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
                            </tr>
                        </thead>
                        <tbody id="dataSiswa">
                            @foreach ($siswa as $no => $s)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $s->no_pendaftaran }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->asal_sekolah }}</td>
                                    <td>{{ $s->no_telp }}</td>
                                    <td>{{ $s->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cari').click(function() {
                var status = $('#statusSiswa').val();
                $('#dataSiswa').empty();
                $.ajax({
                    type: "get",
                    url: "{{ route('laporan.ajax.caridata') }}",
                    data: {
                        status
                    },
                    dataType: "json",
                    success: function(laporan) {
                        if (laporan.length > 0) {
                            $.each(laporan, function(no, l) {
                                $('#dataSiswa').append(
                                    `<tr>
                                        <td>${no+1}</td>    
                                        <td>${l.no_pendaftaran}</td>    
                                        <td>${l.nama}</td>    
                                        <td>${l.asal_Sekolah}</td>    
                                        <td>${l.no_telp}</td>    
                                        <td>${l.status}</td>    
                                    </tr>`
                                );
                            });
                        } else {
                            alert('Tidak Ada Data!');
                        }
                    }
                });
            });
        });
    </script>
@endsection
