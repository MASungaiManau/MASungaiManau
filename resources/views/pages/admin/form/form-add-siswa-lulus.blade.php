@extends('layout.app.app-admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Form Siswa Lulus</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Siswa Lulus</a></li>
                        <li class="breadcrumb-item active">Form</li>
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
                    <form action="{{ route('siswaLulus.add') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. Pendaftaran</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <select name="siswa_id" id="getSiswa" class="form-control select2" required>
                                            <option disabled selected>-- Choose Option --</option>
                                            @foreach ($siswa as $s)
                                                <option value="{{ $s->id }}">{{ $s->no_pendaftaran }} |
                                                    {{ $s->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Nama Siswa</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" id="nama" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Tanggal Daftar</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" id="tanggal" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Alamat</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" id="alamat" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Asal Sekolah</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" id="asal_sekolah" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. Telp</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" id="no_telp" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Keterangan</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <textarea name="keterangan" rows="2" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12"></div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <a href="{{ route('siswaLulus') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#getSiswa').change(function(e) {
                var id = e.target.value;
                $.ajax({
                    type: "get",
                    url: "{{ route('siswaLulus.ajax.getSiswa') }}",
                    data: {
                        id
                    },
                    dataType: "json",
                    success: function(siswa) {
                        $('#nama').val(siswa.nama);
                        $('#tanggal').val(siswa.tanggal);
                        $('#alamat').val(siswa.alamat);
                        $('#asal_sekolah').val(siswa.asal_sekolah);
                        $('#no_telp').val(siswa.no_telp);
                    }
                });
            });
        });
    </script>
@endsection
