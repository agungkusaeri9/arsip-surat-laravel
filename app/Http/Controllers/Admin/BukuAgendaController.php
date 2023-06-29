<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BukuAgendaSuratKeluarExport;
use App\Exports\BukuAgendaSuratMasukExport;
use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use App\Models\SifatSurat;
use App\Models\Surat;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BukuAgendaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Buku Agenda Surat Masuk Read')->only('surat_masuk');
        $this->middleware('can:Buku Agenda Surat Keluar Read')->only('surat_keluar');
    }

    public function surat_masuk()
    {
        $tanggal_awal = request('tanggal_awal');
        $tanggal_akhir = request('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $items = SuratMasuk::whereBetween('tanggal_surat', [$tanggal_awal, $tanggal_akhir]);
        } elseif ($tanggal_awal && !$tanggal_akhir) {
            $items = SuratMasuk::whereDate('tanggal_surat', $tanggal_awal);
        } else {
            $items = SuratMasuk::whereNotNull('id');
        }

        $data = $items ? $items->latest()->get() : array();
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
            $items = SuratKeluar::whereBetween('tanggal_surat', [$tanggal_awal, $tanggal_akhir]);
        } elseif ($tanggal_awal && !$tanggal_akhir) {
            $items = SuratKeluar::whereDate('tanggal_surat', $tanggal_awal);
        } else {
            $items = SuratKeluar::whereNotNull('id');
        }

        $data = $items ? $items->latest()->get() : array();
        $data_sifat_surat = SifatSurat::get();
        return view('admin.pages.buku-agenda.surat-keluar', [
            'title' => 'Buku Agenda Surat Keluar',
            'items' => $data,
            'data_sifat_surat' => $data_sifat_surat
        ]);
    }

    public function surat_keluar_pdf()
    {
        $tanggal_awal = request('tanggal_awal');
        $tanggal_akhir = request('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $items = SuratKeluar::whereBetween('tanggal_surat', [$tanggal_awal, $tanggal_akhir]);
        } elseif ($tanggal_awal && !$tanggal_akhir) {
            $items = SuratKeluar::whereDate('tanggal_surat', $tanggal_awal);
        } else {
            $items = SuratKeluar::whereNotNull('id');
        }

        $data = $items ? $items->latest()->get() : array();

        $pdf = Pdf::loadView('admin.pages.buku-agenda.surat-keluar-pdf', [
            'title' => 'Cetak Buku Agenda Surat Keluar',
            'items' => $data,
            'tanggal_awal' => $tanggal_awal ?? NULL,
            'tanggal_akhir' => $tanggal_akhir ?? NULL,
            'pengaturan' => Pengaturan::first()
        ]);
        return $pdf->download('Laporan Buku Agenda Surat Keluar ' . $tanggal_awal . '/' . $tanggal_akhir . '.pdf');
    }

    public function surat_masuk_pdf()
    {
        $tanggal_awal = request('tanggal_awal');
        $tanggal_akhir = request('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $items = SuratMasuk::whereBetween('tanggal_surat', [$tanggal_awal, $tanggal_akhir]);
        } elseif ($tanggal_awal && !$tanggal_akhir) {
            $items = SuratMasuk::whereDate('tanggal_surat', $tanggal_awal);
        } else {
            $items = SuratMasuk::whereNotNull('id');
        }

        $data = $items ? $items->latest()->get() : array();

        $pdf = Pdf::loadView('admin.pages.buku-agenda.surat-masuk-pdf', [
            'title' => 'Cetak Buku Agenda Surat Masuk',
            'items' => $data,
            'tanggal_awal' => $tanggal_awal ?? NULL,
            'tanggal_akhir' => $tanggal_akhir ?? NULL,
            'pengaturan' => Pengaturan::first()
        ]);
        return $pdf->download('Laporan Buku Agenda Surat Masuk ' . $tanggal_awal . '/' . $tanggal_akhir . '.pdf');
    }

    public function surat_masuk_excel()
    {
        return Excel::download(new BukuAgendaSuratMasukExport(request()->all()), 'Laporan Buku Agenda Surat Masuk.xlsx');
    }

    public function surat_keluar_excel()
    {
        return Excel::download(new BukuAgendaSuratKeluarExport(request()->all()), 'Laporan Buku Agenda Surat Keluar.xlsx');
    }
}
