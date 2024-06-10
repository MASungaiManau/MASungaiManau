@extends('layout.app.app-siswa')
@section('siswa')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12" style="text-align: center;">
                            <img src="{{ Auth::user()->foto ? asset('img/' . Auth::user()->foto) : asset('assets/images/error.png') }}"
                                alt="" style="width: 150px; border-radius: 50%;">
                            <p class="text-center mt-2">Status Pendaftaran</p>
                            @php
                                if (Auth::user()->status == 'Diverifikasi') {
                                    $color = 'warning';
                                } elseif (Auth::user()->status == 'Diterima') {
                                    $color = 'success';
                                } elseif (Auth::user()->status == 'Ditolak') {
                                    $color = 'danger';
                                }
                            @endphp
                            <p class="badge bg-soft-{{ $color }} text-dark fw-bold font-size-12 mb-0">
                                {{ Auth::user()->status }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="#dataDiri" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Data Diri</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#alamat" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Data Alamat</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#ortu" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Data Orang Tua</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#uploadFoto" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Upload Foto</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#setting" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Setting</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="dataDiri" role="tabpanel">
                            <form action="{{ route('formulir.updateDataDiri', $data->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. Pendaftaran</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" value="{{ $data->no_pendaftaran }}" class="form-control"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. KK</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="no_kk" value="{{ $data->no_kk }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>NIK</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="nik" value="{{ $data->nik }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Nama Lengkap</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="nama" value="{{ $data->nama }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Tempat Lahir</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Tanggal Lahir</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="date" name="tgl_lahir" value="{{ $data->tgl_lahir }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Jenis Kelamin</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <select name="jk" class="form-control">
                                            <option value="L" {{ $data->jk == 'L' ? 'selected' : '' }}>Laki - Laki
                                            </option>
                                            <option value="P" {{ $data->jk == 'P' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. Telp</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="no_telp" value="{{ $data->no_telp }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Asal Sekolah</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="asal_sekolah" value="{{ $data->asal_sekolah }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 col-12">
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <button type="submit" class="btn btn-sm btn-primary form-control">Save
                                                    Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="alamat" role="tabpanel">
                            <form action="{{ route('formulir.updateAlamat', $data->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Alamat</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <textarea name="alamat" rows="2" class="form-control">{{ $data->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Desa</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="desa" value="{{ $data->desa }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Kecamatan</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="kecamatan" value="{{ $data->kecamatan }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Kabupaten</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="kabupaten" value="{{ $data->kabupaten }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Provinsi</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="provinsi" value="{{ $data->provinsi }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Kode Pos</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="kode_pos" value="{{ $data->kode_pos }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 col-12">
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <button type="submit" class="btn btn-sm btn-primary form-control">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="ortu" role="tabpanel">
                            <form action="{{ route('formulir.updateOrangTua', $ortu->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Nama Ibu</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="nama_ibu" value="{{ $ortu->nama_ibu }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Pendidikan Ibu</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="pendidikan_ibu" value="{{ $ortu->pendidikan_ibu }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Pekerjaan Ibu</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="pendidikan_ibu" value="{{ $ortu->pendidikan_ibu }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Penghasilan Ibu</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="penghasilan_ibu"
                                            value="{{ $ortu->penghasilan_ibu }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. Telp Ibu</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="no_telp_ibu" value="{{ $ortu->no_telp_ibu }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Nama Ayah</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="nama_ayah" value="{{ $ortu->nama_ayah }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Pendidikan Ayah</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="pendidikan_ayah"
                                            value="{{ $ortu->pendidikan_ayah }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Pekerjaan Ayah</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="pekerjaan_ayah" value="{{ $ortu->pekerjaan_ayah }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Penghasilan Ayah</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="penghasilan_ayah"
                                            value="{{ $ortu->penghasilan_ayah }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. Telp Ayah</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="no_telp_ayah" value="{{ $ortu->no_telp_ayah }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Nama Wali</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="nama_wali" value="{{ $ortu->nama_wali }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Pendidikan Wali</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="pendidikan_wali"
                                            value="{{ $ortu->pendidikan_wali }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Pekerjaan Wali</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="pekerjaan_wali" value="{{ $ortu->pekerjaan_wali }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Penghasilan Wali</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="penghasilan_wali"
                                            value="{{ $ortu->penghasilan_wali }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>No. Telp Wali</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="number" name="no_telp_wali" value="{{ $ortu->no_telp_wali }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 col-12">
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <button type="submit" class="btn btn-sm btn-primary form-control">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="uploadFoto" role="tabpanel">
                            <form action="{{ route('formulir.updateFoto', $data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Foto</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 col-12">
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <button type="submit" class="btn btn-sm btn-primary form-control">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="setting" role="tabpanel">
                            <form action="{{ route('formulir.updateSetting', $data->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Username</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="text" name="username" value="{{ $data->username }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Password</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Baru....">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for=""><b>Konfirmasi Password</b></label>
                                    </div>
                                    <div class="col-md-9 col-12 mb-3">
                                        <input type="password" name="konfirmasi_password" class="form-control" placeholder="Masukkan Konfirmasi Password Baru....">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 col-12">
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <button type="submit" class="btn btn-sm btn-primary form-control">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
