<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Surat <?= $item->judul ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet"> --}}
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap'); */
        body {
            margin-top: -40px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
            font-size: 12px;
        }

        .isi {
            font-size: 12px !important;
        }

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
            color: rgb(64, 150, 145)
        }

        .footer {
            text-align: center;
            position: absolute;
            bottom: 10px;
            right: 0;
            left: 0;
            font-family: 'Caveat', cursive;
            font-size: 25px;
            color: rgb(105, 156, 160);
            font-weight: bold;
            opacity: .5;
        }
    </style>
</head>

<body onload="window.print()">
    <table class="kop-surat" width="100%">
        <tr>
            <td style="width:25%;margin-right:20px">
                <img src="{{ $pengaturan->gambar() }}" width="80px" />
            </td>
            <td class="tengah" width="50%">
                <h4 style="font-size: 10px;margin-bottom:20px;font-weight:normal">YAYASAN PONDOK PESANTREN AL-ISHLAHIYAH
                    SINGOSARI MALANG</h4>
                <h1 style="font-size: 22px;margin-bottom:15px;">SMK TERPADU AL-ISHLAHIYAH</h1>
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
    <div style="text-align:center">
        <h1 style="font-weight:700;text-transform:uppercase;text-decoration:underline"><?= $item->judul ?></h1>
        <div style="font-weight:italic;text-decoration:none;font-size:14px;margin-top:-10px;margin-bottom:10px;">No
            Surat : <?= $item->nomor ?></div>
    </div>
    <div class="isi">
        <?= $item->isi ?>
    </div>

    <table style="margin-top:30px;width:100%">
        <tr>
            <td width="60%"></td>
            <td width="30%">
                <div>
                    <?= $item->tempat_waktu ?>
                </div>
                <div>
                    Kepala Sekolah
                </div>
                <br><br><br><br><br><br>

                <div style="font-weight: bold;font-size:12px">
                    {{ $pengaturan->nama_kepala_sekolah }}
                </div>
            </td>
        </tr>
    </table>
    <div class="footer">
        "Sekolah Sah Ngajine"
    </div>
</body>

</html>
