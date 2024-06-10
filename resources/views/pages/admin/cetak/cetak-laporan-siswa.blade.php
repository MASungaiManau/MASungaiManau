@php
    $setting = DB::table('settings')->get()->first();
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
<style>
    table {
        border-collapse: collapse;
        /* Menggabungkan batas sel */
        width: 100%;
        /* Lebar tabel */
    }

    th,
    td {
        border: 1px solid black;
        /* Menambahkan border ke header dan sel */
        padding: 8px;
        /* Ruang di dalam sel */
        text-align: left;
        /* Aligment teks */
    }
</style>

<body id="cetak" onload="cetakPDF();">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-3">
                <img src="{{ asset('assets/logo/logo.jpg') }}" alt="" style="width: 100px;">
            </div>
            <div class="col-md-8 col-6">
                <h6 class="text-center" style="margin-bottom: 1px;">Laporan Penerimaan Calon Siswa</h6>
                <p class="text-center" style="margin-bottom: 1px;">Alamat : Jl. Bangko -Kerinci Km. 46 Sungai Manau Telp
                    (0746) .....Kode Pos (37361)</p>
                <p style="margin-bottom: 1px;">
                <div class="row">
                    <div class="text-center col-md-6 col-6">
                        <p>NSM : 131210020006</p>
                    </div>
                    <div class="text-center col-md-6 col-6">
                        <p>NPSN : 10507927</p>
                    </div>
                </div>
                </p>
            </div>
            <div class="col-md-2 col-3">
                <img src="{{ asset('assets/logo/logo.jpg') }}" alt="" style="width: 100px;">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-12">
                <table border="1" style="width: 100%;">
                    <thead>
                        <tr style="background-color: green; color: white;">
                            <th>No.</th>
                            <th>No. Pendaftaran</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Asal Sekolah</th>
                            <th>Status</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $no => $s)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $s->no_pendaftaran }}</td>
                                <td>{{ $s->nik }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->jk }}</td>
                                <td>{{ $s->tgl_lahir }}</td>
                                <td>{{ $s->alamat }}</td>
                                <td>{{ $s->asal_sekolah }}</td>
                                <td>{{ $s->status }}</td>
                                <td><img src="{{ asset('img/' . $s->foto) }}" alt="" style="width: 100px;"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p style="margin-bottom: 1px;">Jumlah Laki - Laki : {{ $pria }}</p>
                <p>Jumlah Perempuan : {{ $wanita }}</p>
                <p style="text-align: right; margin-bottom: 50px;">Sungai Manau, .. ......... {{ date('Y') }}</p>
                <p style="text-align: right; padding-right: 40px;">(...........................)</p>
            </div>
        </div>
    </div>

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
                filename: `laporan Penerimaan Mahasiswa Baru.pdf`,
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
                    orientation: 'landscape'
                }
            }).then(function() {
                // Kembalikan background setelah selesai mencetak
                document.body.style.backgroundColor = '#FFFFFF';
                window.location.href = '/laporan';
            });

        }
    </script>
</body>

</html>
