<table class="tb-info">
    <tr>
        <td style="text-align:center" colspan="6">Laporan Buku Agenda Surat Keluar</td>
    </tr>
    <tr></tr>
    <tr>
        <td style="text-align:left" colspan="2">Tanggal Awal</td>
        <td> : </td>
        <td>
            {{ $tanggal_awal ?? 'Semua' }}
        </td>
    </tr>

    <tr>
        <td style="text-align:left" colspan="2">Tanggal Akhir</td>
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
            <th>No Agenda</th>
            <th>Penerima</th>
            <th>Keterangan</th>
            <th>Tanggal Surat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td style="text-align:center">{{ $loop->iteration }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->no_agenda }}</td>
                <td>{{ $item->penerima }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tanggal_surat ? $item->tanggal_surat->translatedFormat('d-m-Y') : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
