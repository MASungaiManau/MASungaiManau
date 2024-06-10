@extends('layout.app.app-siswa')
@section('siswa')
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

            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun

            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }
    @endphp
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
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12 mb-3">
                            <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#addNew">
                                <i class="fas fa-user-plus font-size-16 align-middle me-2"></i>
                                Tambah Pembayaran
                            </button>
                            <button type="button" class="btn btn-sm btn-info waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#detailPembayaran">
                                <i class="fas fa-eye font-size-16 align-middle me-2"></i>
                                Detail Pembayaran
                            </button>
                            {{-- Modal Detail Pembayaran --}}
                            <div id="detailPembayaran" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myModalLabel">Pengguna
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-boredered">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Biaya</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total = 0;
                                                    @endphp
                                                    @foreach ($biaya as $no => $b)
                                                        @php
                                                            $total += $b->jumlah;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $no + 1 }}</td>
                                                            <td>{{ $b->nama_biaya }}</td>
                                                            <td>Rp {{ number_format($b->jumlah, 0, ',', '.') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Transaksi</th>
                                        <th>No. Pendaftaran</th>
                                        <th>Nama Siswa</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                        <th>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $jumlahBayar = 0;
                                    @endphp
                                    @foreach ($pembayaran as $no => $p)
                                        @php
                                            $jumlahBayar += $p->jumlah_bayar;
                                        @endphp
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $p->kode_transaksi }}</td>
                                            <td>{{ $p->siswa->no_pendaftaran }}</td>
                                            <td>{{ $p->siswa->nama }}</td>
                                            <td>Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }}</td>
                                            <td>{{ tglIndo($p->tanggal) }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-soft-{{ $p->status == 'Diverifikasi' ? 'success' : 'warning' }} text-dark fw-bold font-size-12 mb-0">
                                                    {{ $p->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <ul class="d-flex list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <button type="button"
                                                            class="btn btn-info p-0 avatar-xs d-block rounded-circle"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bukti{{ $p->id }}">
                                                            <span class="avatar-title bg-transparent text-white">
                                                                <i class="far fa-eye"></i>
                                                            </span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <div id="bukti{{ $p->id }}" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myModalLabel">Bukti Pembayaran
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed src="{{ asset('bukti/' . $p->bukti) }}"
                                                            type="application/pdf" width="100%" height="600px" />
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
                        <div class="col-md-12 col-12">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Jumlah Dibayar</th>
                                    <th><span>Rp {{ number_format($jumlahBayar, 0, ',', '.') }}</span></th>
                                </tr>
                                <tr>
                                    <th>Total Pembayaran</th>
                                    <th><span>Rp {{ number_format($total, 0, ',', '.') }}</span></th>
                                </tr>
                                <tr>
                                    <th>Sisa Pembayaran</th>
                                    <th><span>Rp {{ number_format(($total - $jumlahBayar), 0, ',', '.') }}</span></th>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th>
                                        @php
                                            if($jumlahBayar < $total){
                                                $color = 'danger';
                                                $status = 'Belum Lunas';
                                            }else{
                                                $color = 'success';
                                                $status = 'Lunas';
                                            }
                                        @endphp
                                        <span class="badge bg-soft-{{ $color }} text-dark fw-bold font-size-12 mb-0">
                                           {{ $status }}
                                        </span>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add New --}}
    <div id="addNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Pembayaran
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pembayaran.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Tanggal</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control"
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Jumlah Dibayar</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="number" name="jumlah_bayar" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for=""><b>Bukti</b></label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="file" name="bukti" class="form-control" required>
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
