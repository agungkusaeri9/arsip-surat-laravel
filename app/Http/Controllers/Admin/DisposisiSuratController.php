<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisposisiSurat;
use App\Models\Klasifikasi;
use App\Models\SifatSurat;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DisposisiSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Disposisi Read')->only('index');
        $this->middleware('can:Disposisi Create')->only(['create','store']);
        $this->middleware('can:Disposisi Update')->only(['edit','update']);
        $this->middleware('can:Disposisi Delete')->only('destroy');
    }


    public function index($id)
    {
        $item = SuratMasuk::with(['disposisis.klasifikasi'])->findOrFail($id);
        return view('admin.pages.disposisi-surat.index', [
            'title' => 'Data Disposisi Surat',
            'item' => $item,
        ]);
    }

    public function create($id)
    {
        $item = SuratMasuk::with(['disposisis.klasifikasi'])->findOrFail($id);
        $klasifikasis = Klasifikasi::get();
        $sifatSurats = SifatSurat::get();
        return view('admin.pages.disposisi-surat.create', [
            'title' => 'Tambah Disposisi Surat',
            'item' => $item,
            'klasifikasis' => $klasifikasis,
            'sifatSurats' => $sifatSurats
        ]);
    }

    public function store($id)
    {
        $item = SuratMasuk::with(['disposisis.klasifikasi'])->findOrFail($id);
        request()->validate([
            'sifat_surat_id' => ['required'],
            'klasifikasi_id' => ['required'],
            'batas_waktu' => ['required']
        ]);


        $data = request()->all();
        $item->disposisis()->create($data);
        return redirect()->route('admin.disposisi-surat.index',$item->id)->with('success','Disposisi Berhasil ditambahakan');
    }

    public function edit($id)
    {
        $item = DisposisiSurat::findOrFail($id);
        $klasifikasis = Klasifikasi::get();
        $sifatSurats = SifatSurat::get();
        return view('admin.pages.disposisi-surat.edit', [
            'title' => 'Edit Disposisi Surat',
            'item' => $item,
            'klasifikasis' => $klasifikasis,
            'sifatSurats' => $sifatSurats,
        ]);
    }

    public function update($id)
    {
        $item = DisposisiSurat::findOrFail($id);
        request()->validate([
            'sifat_surat_id' => ['required'],
            'klasifikasi_id' => ['required'],
            'batas_waktu' => ['required']
        ]);


        $data = request()->all();
        $item->update($data);
        return redirect()->route('admin.disposisi-surat.index',$item->surat_masuk_id)->with('success','Disposisi Berhasil disimpan');
    }

    public function destroy($id)
    {
        $item = DisposisiSurat::findOrFail($id);
        $surat_masuk_id = $item->surat_masuk_id;
        $item->delete();
        return redirect()->route('admin.disposisi-surat.index',$surat_masuk_id)->with('success','Disposisi Berhasil dihapus');
    }
}
