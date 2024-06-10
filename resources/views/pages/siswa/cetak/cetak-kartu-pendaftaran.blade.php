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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id="cetak" onload="cetakPDF();">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12">
                <img src="{{ asset('kop.jpg') }}" alt="" style="width: 100%; height: 90%;">
            </div>
            <div class="col-md-12 col-12 mb-3">
                <h5 class="text-center">Kartu Pendaftaran Peserta Didik Tahun</h5>
            </div>
            <div class="col-md-12 col-12">
                <table>
                    <tr>
                        <th><b>1.</b></th>
                        <th><b>Registrasi Peserta Didik</b></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jenis Pendaftaran</td>
                        <td>:</td>
                        <td>{{ $data->jenis }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nomor Pendaftaran</td>
                        <td>:</td>
                        <td>{{ $data->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <th><b>2.</b></th>
                        <th><b>Biodata Peserta Didik</b></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{ $data->nik }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $data->jk == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td>{{ $data->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ date('d/m/Y', strtotime($data->tgl_lahir)) }}</td>
                    </tr>
                    <tr>
                        <th><b>3.</b></th>
                        <th><b>Alamat Peserta Didik</b></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Desa</td>
                        <td>:</td>
                        <td>{{ $data->desa }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>{{ $data->kecamatan }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kabupaten</td>
                        <td>:</td>
                        <td>{{ $data->kabupaten }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td>{{ $data->provinsi }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kode Pos</td>
                        <td>:</td>
                        <td>{{ $data->kode_pos }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 col-12 mt-4" style="text-align: right;">
                <p>Sungai Manau, {{ tglIndo(date('Y-m-d')) }}</p>
                <br>
                <br>
                <br>
                <p><b>{{ $data->nama }}</b></p>
            </div>
        </div>
    </div>

    @include('layout.script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function cetakPDF() {
            document.body.style.backgroundColor = '#FFFFFF';
            // Gunakan html2pdf untuk membuat PDF
            var element = document.getElementById('cetak'); // Ganti dengan ID atau selector yang sesuai
            html2pdf(element, {
                margin: 10,
                filename: `Kartu Pendaftaran.pdf`,
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            }).then(function() {
                // Kembalikan background setelah selesai mencetak
                document.body.style.backgroundColor = '#FFFFFF';
                window.location.href = '/kartu-pendaftaran';
            });

        }
    </script>
</body>

</html>
