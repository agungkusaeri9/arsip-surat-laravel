<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SifatSurat;
use App\Models\Surat;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class BukuAgendaController extends Controller
{
    public function surat_masuk()
    {
        $tanggal_awal = request('tanggal_awal');
        $tanggal_akhir = request('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $items = SuratMasuk::whereBetween('tanggal_surat',[$tanggal_awal,$tanggal_akhir]);

        }elseif($tanggal_awal && !$tanggal_akhir)
        {
            $items = SuratMasuk::whereDate('tanggal_surat',$tanggal_awal);
        }else{
            $items = SuratMasuk::whereNotNull('id');
        }

        $data = $items ? $items->latest()->get(): array();
        $data_sifat_surat = SifatSurat::get();
        return view('admin.pages.buku-agenda.surat-masuk', [
            'title' => 'Buku Agenda Surat Masuk',
            'items' => $data,
            'data_sifat_surat' => $data_sifat_surat
        ]);
    }

    public function surat_keluar()
    {
        $tanggal_awal = request('tanggal_awal');
        $tanggal_akhir = request('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $items = SuratKeluar::whereBetween('tanggal_surat',[$tanggal_awal,$tanggal_akhir]);

        }elseif($tanggal_awal && !$tanggal_akhir)
        {
            $items = SuratKeluar::whereDate('tanggal_surat',$tanggal_awal);
        }else{
            $items = SuratKeluar::whereNotNull('id');
        }

        $data = $items ? $items->latest()->get(): array();
        $data_sifat_surat = SifatSurat::get();
        return view('admin.pages.buku-agenda.surat-keluar', [
            'title' => 'Buku Agenda Surat Keluar',
            'items' => $data,
            'data_sifat_surat' => $data_sifat_surat
        ]);
    }
}
