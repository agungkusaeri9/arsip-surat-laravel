<?php

namespace App\Exports;

use App\Models\Pengaturan;
use App\Models\SuratMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BukuAgendaSuratMasukExport implements FromView
{
    public $post;
    public function __construct($post)
    {
        $this->post = $post;
    }

    public function view(): View
    {
        $tanggal_awal = $this->post['tanggal_awal'] ?? NULL;
        $tanggal_akhir = $this->post['tanggal_akhir'] ?? NULL;

        if ($tanggal_awal && $tanggal_akhir) {
            $items = SuratMasuk::whereBetween('tanggal_surat', [$tanggal_awal, $tanggal_akhir]);
        } elseif ($tanggal_awal && !$tanggal_akhir) {
            $items = SuratMasuk::whereDate('tanggal_surat', $tanggal_awal);
        } else {
            $items = SuratMasuk::whereNotNull('id');
        }

        $data = $items ? $items->latest()->get() : array();

        return view('admin.pages.buku-agenda.surat-masuk-excel', [
            'items' => $data,
            'pengaturan' => Pengaturan::first(),
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir
        ]);
    }
}
