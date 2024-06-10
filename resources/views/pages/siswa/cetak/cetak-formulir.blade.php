<!DOCTYPE html>

<html lang="en">

<head>
    <title>Document</title>
</head>

<body  onload="cetakPDF()">
    <div id="cetak">
        <table style="width: 100%;">
            <tr>
                <th rowspan="2">
                    <img src="{{ asset('img/logo/Logo_65f412d2f4198.png') }}" alt="" style="width: 100px;">
                </th>
                <th colspan="2" style="text-align: center;">
                    <h3 style="margin-bottom: 0;">KEMENTERIAN AGAMA RI</h3>
                    <h2 style="margin-top: 0; margin-bottom: 0;">MADRASAH ALIYAH SUNGAI MANAU</h2>
                    <h3 style="margin-top: 0; margin-bottom: 0;">KABUPATEN MERANGIN</h3>
                </th>
            </tr>
            <tr>
                <th>
                    <h6 style="margin-top: 0; margin-bottom: 0; text-align: left;">Jalan : Bangko - Kerinci KM. 46
                        Sungai
                        Manau</h6>
                </th>
                <th>
                    <h6 style="margin-top: 0; margin-bottom: 0; text-align: left;">Kode Pos : 37361</h6>
                </th>
            </tr>
        </table>
        <hr>
        <table style="width: 100%;">
            <tr>
                <th colspan="2">
                    FORMULIR PENDAFTARAN TAHUN PELAJARAN {{ date('Y') }} / {{ date('Y') + 1 }}
                </th>
            </tr>
        </table>
        <table>
            <tr>
                <td>1.</td>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>{{ $data->nama }}</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>NISN</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>No. Pendaftaran</td>
                <td>:</td>
                <td>{{ $data->no_pendaftaran }}</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $data->tempat_lahir }}, {{ date('d-m-Y', strtotime($data->tgl_lahir)) }}</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="checkbox" {{ $data->jk == 'Laki' ? 'checked' : '' }}>Laki - Laki
                    <input type="checkbox" {{ $data->jk == 'P' ? 'checked' : '' }}>Perempuan
                </td>
            </tr>
            <tr>
                <td>7.</td>
                <td>Agama</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{ $data->asal_sekolah }}</td>
            </tr>
            <tr>
                <td>9.</td>
                <td>Status Sekolah</td>
                <td>:</td>
                <td>
                    <input type="checkbox">Negeri
                    <input type="checkbox">Swasta
                </td>
            </tr>
            <tr>
                <td>10.</td>
                <td>Tahun Ijazah</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>11.</td>
                <td>Nomor Ijazah</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>12.</td>
                <td>Nama Ayah</td>
                <td>:</td>
                <td>{{ $ortu->nama_ayah }}</td>
            </tr>
            <tr>
                <td>13.</td>
                <td>Nama Ibu</td>
                <td>:</td>
                <td>{{ $ortu->nama_ibu }}</td>
            </tr>
            <tr>
                <td>14.</td>
                <td>Alamat Orang Tua</td>
                <td>:</td>
                <td>{{ $ortu->alamat_ibu }}</td>
            </tr>
            <tr>
                <td>12.</td>
                <td>Pekerjaan Orang Tua</td>
                <td>:</td>
                <td>{{ $ortu->pekerjaan_ayah }}</td>
            </tr>
            <tr>
                <td>12.</td>
                <td>Pendidikan Orang Tua</td>
                <td>:</td>
                <td>{{ $ortu->pendidikan_ayah }}</td>
            </tr>
            <tr>
                <td>12.</td>
                <td>Anak Ke</td>
                <td>:</td>
                <td>.............Dari Jumlah ..........Orang</td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table style="width: 100%;">
            <tr>
                <th colspan="2" style="text-align: left;"><u>Persyaratan</u></th>
            </tr>
            <tr>
                <td style="width: 10px;">1.</td>
                <td>Photo Copi Ijazah dan SKHU SD/MI Sederajat</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Photo Copy SKHU 2 Lembar yang telah di legalisir</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Pas Photo hitam Putih 3x4 = 4 Lembar 2x3= 4 Lembar</td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Surat Kelakuan baik dari sekolah</td>
            </tr>
            <tr>
                <td>5.</td>
                <td>Photo Copy Kartu Keluarga ( KK )</td>
            </tr>
            <tr>
                <td>6.</td>
                <td>Photo Copy kartu BSM,PKH,KIS,KKS,KIP ( Jika Ada )</td>
            </tr>
            <tr>
                <td>7.</td>
                <td>
                    <b>Map</b>
                    <br>
                    - Laki-laki warna kuning 2 lembar
                    <br>
                    - Perempuan warna merah 2 lembar
                </td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Uang Pendaftaran GRATIS</td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table style="width: 100%;">
            <tr>
                <td>
                    <img src="{{ asset('img/' . $data->foto) }}" alt=""
                        style="width: 3cm; height: 4cm; margin-left: 30px;">
                </td>
                <td>
                    <u><b>Tanda Tangan</b></u>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    {{ $data->nama }}
                </td>
            </tr>
        </table>
    </div>
</body>
@include('layout.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function cetakPDF() {
        // document.body.style.backgroundColor = '#FFFFFF';
        // Gunakan html2pdf untuk membuat PDF
        var element = document.getElementById('cetak'); // Ganti dengan ID atau selector yang sesuai
        html2pdf(element, {
            margin: 10,
            filename: `Formulir.pdf`,
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
            // window.location.href = '/daftar-ulang';
        });

    }
</script>

</html>
