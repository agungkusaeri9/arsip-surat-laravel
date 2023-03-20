<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $surat_masuk = SuratMasuk::whereNotNull('file')->get()->toArray();
        $surat_keluar = SuratKeluar::whereNotNull('file')->get()->toArray();
        $items = array_merge($surat_masuk,$surat_keluar);

        return view('admin.pages.galeri.index',[
            'title' => 'Galeri File',
            'items' => $items
        ]);
    }
}
