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

    $set = DB::table('settings')->get()->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
    <title>PSB ONLINE | {{ $set->nama_sekolah }}</title>
    <!-- META DISKRIPSI-->
    <meta name="description" content="" />
    <meta name="keywords" content="SMK NU 03 BONDOWOSO" />

    <!-- Vendor -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />

    <link href="https://unbk.kemdikbud.go.id/vendor/chart/Chart.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/modules/izitoast/css/iziToast.min.css') }}" />

    {{-- <link href="https://unbk.kemdikbud.go.id/assets/css/front.min.css" rel="stylesheet" /> --}}
    <link rel="shortcut icon" href="{{ asset('img/logo/' . $set->logo) }}" />

    <link rel="stylesheet" href="{{ asset('home/css/front.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/1.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/css/2.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/css/3.css') }}" />

    <link rel="stylesheet" href="{{ asset('home/css/components2.css') }}" />

    <link rel="stylesheet" href="{{ asset('home/modules/bootstrap-daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/modules/fontawesome/css/all.min.css') }}" />
    <!--WAKTU JALAN-->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/front/vendor/animate/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/front/vendor/countdowntime/flipclock.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/front/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/floating-wpp.min.css') }}" />
    <!--===============================================================================================-->
</head>

<body data-spy="scroll" data-target="#menu" data-offset="100">
    <div class="home-wrapper" id="home">
        <!-- Header -->
        <div class="home-header">
            <div class="container p-0">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar-header" style="background-color: #03318C;">
                    <a class="navbar-brand" href="javascript:;">
                        <img src="{{ asset('img/logo/' . $set->logo) }}" height="75" />
                        <div class="home-header-text d-none d-sm-block" style="color: white;">
                            <h5>PENERIMAAN SISWA BARU</h5>
                            <h6>MADRASAH ALIYAH SWASTA SUNGAI MANAU</h6>
                            <h6>TAHUN {{ date('Y') }}</h6>
                        </div>
                        <span class="logo-mini-unbk d-block d-sm-none">PSB </span>
                        <span class="logo-mini-tahun d-block d-sm-none">_ONLINE</span>
                    </a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#menu"
                        aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#home" id="link-home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tentang" id="link-tentang" style="color: white;">Daftar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#persyaratan" id="link-persyaratan" style="color: white;">Info
                                    Pendaftaran</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" id="link-jadwal"
                                    style="color: white;">Admin</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Header -->
        <!-- Banner -->
        <div class="home-banner">
            <div class="home-banner-bg home-banner-bg-color"></div>
            <div class="home-banner-bg home-banner-bg-img"></div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-8">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div>
                                        <p>{!! $slider->slider !!}</p>
                                        <p data-animation="animated flipInX" data-delay="3s">
                                            <a href="/#tentang" class="btn btn-warning nav-link">
                                                Formulir Pendaftaran
                                                <span class="fa fa-chevron-down"></span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div>
                                        <p>{!! $slider->slider2 !!}</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div>
                                        <p>{!! $slider->slider3 !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-login bg-info">
                            <div class="card-body">
                                <!-- <img src="assets/logo/logo.png" alt="" width="85%" /> -->
                                <br />
                                <form id="form-login" action="{{ route('siswa.postLogin') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <span class="fa fa-user"></span>
                                        <input type="text" onkeyup="this.value = this.value.toUpperCase()"
                                            class="form-control" name="username" placeholder="Masukkan Username"
                                            required autocomplete="off" />
                                    </div>
                                    <div class="form-group">
                                        <span class="fa fa-key"></span>
                                        <input type="password" class="form-control" name="password"
                                            id="inputPassword4" placeholder="Password" />
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block btn-login"
                                        id="btnsimpan">
                                        Masuk
                                    </button>
                                </form>
                                <br />
                                <a href="#tentang" class="btn btn-primary btn-block btn-login">
                                    Daftar Disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner -->
        <!-- Content -->
        <div class="home-content" style="background-color: #03318C">
            <section id="tentang">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 d-flex align-items-center">
                            <div class="col-md-12 animated bounceInLeft">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h4>Formulir Pendaftaran</h4>
                                    </div>
                                    @if ($set->status_pendaftaran == 'Ditutup')
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <h4 class="text-center">Pendaftaran Belum Dibuka!</h4>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <form action="{{ route('calonSiswa.register') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="jenis">JENIS PENDAFTARAN</label>
                                                        <select class="form-control" name="jenis" id="jenis">
                                                            <option value="Siswa Baru">Siswa Baru</option>
                                                            <option value="Siswa Baru">Pindahan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nisn">Username</label>
                                                        <input type="text" maxlength="10" class="form-control"
                                                            name="username" placeholder="Username" required />
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="nama">NAMA LENGKAP*</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            placeholder="Nama Lengkap" autocomplete="off" required />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nohp">NO HANDPHONE</label>
                                                        <input type="number" class="form-control" name="no_telp"
                                                            placeholder="No HP Whatsapp" required />
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="tempat">TEMPAT LAHIR</label>
                                                        <input type="text" class="form-control"
                                                            name="tempat_lahir" required />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="tgllahir">TANGGAL LAHIR</label>
                                                        <input type="date" class="form-control datepicker"
                                                            name="tgl_lahir" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">PASSWORD (Mohon Diingat!)</label>
                                                    <input type="password" class="form-control" 
                                                        name="password" id="inputPassword4" placeholder="Password" required />
                                                </div>
                                            </div>
                                            <div class="card-header bg-white">
                                                <button id="btnsimpan" type="submit" class="btn btn-lg btn-primary">
                                                    DAFTAR
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p align="center">
                                <img src="{{ asset('home/gambar.png') }}" align="center" width="600"
                                    style="max-width: 100%" />
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            {{-- <section class="bg-light statistik" id="statistik">
                <div class="container">
                    <h5 class="text-center">Data Pendaftar</h5>
                    <h6 class="text-center">
                        Peserta Didik Baru
                        {{ $set->nama_Sekolah }}
                        Tahun {{ date('y') }}
                    </h6>
                    <div class="row mt-12">
                        <div class="col-sm-6">
                            <div class="card mt-2">
                                <div class="card-header bg-primary">Data Pendaftar</div>
                                <div class="card-body">
                                    <h2 class="text-center">
                                        65
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mt-2">
                                <div class="card-header bg-success">Quota Pendaftar</div>
                                <div class="card-body">
                                    <h2 class="text-center">
                                        87
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <section class=" statistik" id="persyaratan" style="background-color: #03318C;">
                <div class="container">
                    <h5 class="text-center" style="color: white;">Info Pendaftaran </h5>
                    <h6 class="text-center" style="color: white;">Siswa Baru {{ $set->nama_sekolah }} Tahun
                        {{ date('Y') }}</h6>
                    <div class="row mt-12">
                        <div class="col-sm-6">
                            <div class="card mt-2">
                                <div class="card-header bg-primary">Cara Daftar</div>
                                <div class="card-body">
                                    <div class="col-12 animated bounceIn">

                                        <div class="activities">
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    1
                                                </div>
                                                <div class="activity-detail">
                                                    <p>Calon Siswa mendaftar di web pendaftaran.</p>
                                                    <p><a href="#tentang" class="btn btn-primary btn-login">
                                                            Klik Disini</a>.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="activities">
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    2
                                                </div>
                                                <div class="activity-detail">
                                                    <p>Jika selesai pendaftaran silahkan login dengan username dan
                                                        password saat pendaftaran</p>
                                                    <p><a href="#tentang" class="btn btn-success btn-login">
                                                            Daftar Disini</a></p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="activities">
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    3
                                                </div>
                                                <div class="activity-detail">
                                                    <p>Lengkapi Formulir yang diberikan dengan data yang benar.</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mt-2">
                                <div class="card-header bg-secondary">Pengumuman</div>
                                <div class="card-body">
                                    @foreach ($pengumuman as $p)
                                        <div class="row mb-3">
                                            <div class="col-12 animated bounceIn">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="activities">
                                                            <div class="activity">
                                                                <div
                                                                    class="activity-icon bg-primary text-white shadow-primary">
                                                                    <i class="fas fa-bullhorn"></i>
                                                                </div>
                                                                <div class="activity-detail">
                                                                    <div class="mb-2">
                                                                        <span class="text-job text-primary">
                                                                            {{ tglIndo($p->tanggal) }}
                                                                        </span>
                                                                        <span class="bullet"></span>
                                                                        <!-- <a class="text-job" href="#">View</a> -->

                                                                    </div>
                                                                    <h5>{{ $p->judul }}</h5>
                                                                    <p>{{ $p->pengumuman }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Content -->
    </div>
    <div id="floating"></div>

    <!-- Vendor -->
    <script src="https://unbk.kemdikbud.go.id/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://unbk.kemdikbud.go.id/vendor/jquery/jquery.form.min.js"></script>
    <script src="https://unbk.kemdikbud.go.id/vendor/bootstrap-4/js/bootstrap.min.js"></script>
    <script src="https://unbk.kemdikbud.go.id/vendor/bootstrap-4/js/popper.min.js"></script>
    <script src="https://unbk.kemdikbud.go.id/vendor/wow/js/wow.min.js"></script>
    <script src="https://unbk.kemdikbud.go.id/vendor/chart/Chart.min.js"></script>

    <!-- Assets -->
    <script src="https://unbk.kemdikbud.go.id/assets/js/front.min.js"></script>
    <!-- Assets -->

    <script src="{{ asset('home/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('home/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('home/modules/popper.js') }}"></script>
    <script src="{{ asset('home/modules/tooltip.js') }}"></script>
    <script src="{{ asset('home/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('home/modules/moment.min.js') }}"></script>
    <script src="{{ asset('home/js/stisla.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('home/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('home/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('home/modules/izitoast/js/iziToast.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <!-- JS DATATABLE -->
    <script src="{{ asset('home/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('home/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('home/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('home/js/scripts.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script src="{{ asset('home/js/floating-wpp.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if ($pesan = session('success'))
        <script>
            swal("{{ $pesan }}", "You clicked the button!", "success");
        </script>
    @elseif ($pesan = session('error'))
        <script>
            swal("{{ $pesan }}", "You clicked the button!", "error");
        </script>
    @endif

    <script type="text/javascript">
        var pesan = 'Assalamualaikum';
        $('#floating').floatingWhatsApp({
            phone: '+6281272460713',
            popupMessage: pesan,
            showPopup: true,
            size: '48px',
        });
    </script>
    <script type="text/javascript">
        $('.loader').fadeOut('slow');
        $(document).ready(function() {
            $('.klikmenu').click(function() {
                var menu = $(this).data('id');
                if (menu == "beranda") {
                    $('#btndaftar').show();
                    $('#isi_load').load('home.php');
                } else if (menu == "pendaftaran") {
                    $('#btndaftar').hide();
                    $('#isi_load').load('pendaftaran.php');
                } else if (menu == "daftar") {
                    $('#isi_load').load('datadaftar.php');
                } else if (menu == "siswa") {
                    $('#isi_load').load('siswa.php');
                } else if (menu == "pengumuman") {
                    $('#isi_load').load('pengumuman.php');
                } else if (menu == "login") {
                    $('#isi_load').load('login.php');
                }
            });
            // halaman yang di load default pertama kali
            $('#isi_load').load('home.php');
        });
    </script>
</body>

</html>
