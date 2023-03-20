<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Surat <?= $item->judul ?></title>
    <style>
        body {
            padding: 10px 50px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        table.kop-surat {
            border-bottom: 3px solid #000;
            padding: 2px;
        }

        .isi {
            font-size: 12px !important;
        }
    </style>
</head>

<body onload="window.print()">
    <table class="kop-surat" width="100%">
        <tr>
            <td style="width:15%">
                <img src="{{ $pengaturan->gambar() }}" width="120px" />
            </td>
            <td class="tengah">
                <h3>PEMERINTAH KABUPATEN KEDIRI</h3>
                <h3>DINAS PENDIDIKAN</h3>
                <h3>SEKOLAH DASAR NEGERI KALIPANG 4</h3>
                <div>
                    Dusun Krampyang Desa Kalipang Kecamatan Grogol <br>
                    <div style="margin-top:10px">
                        Email : {{ $pengaturan->email }}
                    </div>
                </div>
                <div style="text-align:right;margin-top:20px;">
                    Kode Pos : {{ $pengaturan->kode_pos }}
                </div>
                <div style="text-align:center;margin-top:20px;margin-bottom:10px;">
                    KEDIRI
                </div>
            </td>
        </tr>
    </table>
    <div style="text-align:center">
        <h3 style="font-weight:700"><?= $item->judul ?></h3>
        <h4 style="font-weight:500;text-decoration:underline">No Surat : <?= $item->nomor ?></h4>
    </div>
    <div class="isi">
        <?= $item->isi ?>
    </div>

    <table style="margin-top:30px;">
        <tr>
            <td style="width:60%"></td>
            <td style="">
                <div>
                    <?= $item->tempat_waktu ?>
                </div>
                <div>
                    Kepala SDN Kalipang 4
                </div>
                <br><br><br><br><br>
                <div>
                    {{ $pengaturan->nama_kepala_sekolah }}
                </div>
                <div style="text-decoration:underline;width:100%;border:0.5px solid black;">

                </div>
                <div>
                    NIP.{{ $pengaturan->nip_kepala_sekolah }}
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
