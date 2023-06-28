<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Buku Agenda Surat Keluar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet"> --}}
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap'); */
        body {
            margin-top: -40px;
            font-family: "Times New Roman", Times, serif;
            font-size: 14px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
            font-size: 12px;
        }

        /* .isi {
            font-size: 12px !important;
        } */

        .li-kanan {
            font-size: 10px;
        }

        .kotak-merah {
            height: 8px;
            width: 8px;
            background: red;
            display: inline
        }

        .hijau {
            color: rgb(0, 0, 0)
        }

        body {
            font-size: 12px;
        }

        table {
            width: 100%;
        }
        table.tb-info {
            width: 40% !important;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #020202;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row,
        tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>

<body>
    <table class="kop-surat" width="100%">
        <tr>
            <td style="width:25%;margin-right:20px">
                <img src="{{ $pengaturan->gambar() }}" width="80px" />
            </td>
            <td class="tengah" width="50%">
                <h4 style="font-size: 10px;margin-bottom:20px;font-weight:normal">YAYASAN PONDOK PESANTREN AL-ISHLAHIYAH
                    SINGOSARI MALANG</h4>
                <h1 style="font-size: 20px;margin-bottom:15px;">SMK TERPADU AL-ISHLAHIYAH</h1>
                <h3 style="font-size: 12px;margin-bottom:10px;font-weight:normal">NSS:322051805052, NPSN:20549523,
                    Terakreditasi B</h3>
            </td>
            <td style="width:25%">
                <ul style="list-style: none;text-align:right">
                    <li class="li-kanan">
                        Paket Keahlian:
                    </li>
                    <li class="li-kanan hijau">
                        Multimedia
                        <div class="kotak-merah"></div>
                    </li class="li-kanan hijau">
                    <li class="li-kanan hijau">
                        Teknik Komputer Jaringan
                        <div class="kotak-merah"></div>
                    </li>
                    <li class="li-kanan hijau">
                        Tata Busana
                        <div class="kotak-merah"></div>
                    </li>
                    <li class="li-kanan hijau">
                        Administrasi Perkantoran
                        <div class="kotak-merah"></div>
                    </li>
                </ul>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;border-top:1px solid black;border-bottom:1px solid black">
                <span style="font-size: 10px;">Jalan Kramat 81 Singosari, Malang 65153 Telp. 0341-441459 Fax. 0341-45045
                    Website:
                    www.smk-ishlahiyah.sch.id Email: smk.ishlahiyah@yahoo.co.id</span>
            </td>
        </tr>
    </table>

    <h2 style="text-align: center">Laporan Buku Agenda Surat Masuk</h2>
    <table class="tb-info">
        <tr>
            <td style="text-align:left">Tanggal Awal</td>
            <td> : </td>
            <td>
              {{ $tanggal_awal ?? 'Semua' }}
            </td>
        </tr>
        <tr>
            <td style="text-align:left">Tanggal Akhir</td>
            <td> : </td>
            <td>
               {{ $tanggal_akhir ?? 'Semua' }}
            </td>
        </tr>
    </table>
    <table class="styled-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>No. Agenda</th>
                <th>No. Surat</th>
                <th>Pengirim</th>
                <th>Keterangan</th>
                <th>Tanggal Surat</th>
                <th>Tanggal DIterima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td style="text-align:center">{{ $loop->iteration }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->no_agenda }}</td>
                    <td>{{ $item->no_surat }}</td>
                    <td>{{ $item->pengirim }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->tanggal_surat ? $item->tanggal_surat->translatedFormat('d-m-Y') : '-' }}</td>
                    <td>{{ $item->tanggal_diterima ? $item->tanggal_diterima->translatedFormat('d-m-Y') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
