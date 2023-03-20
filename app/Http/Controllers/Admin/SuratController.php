<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    public function index()
    {
        $items = Surat::latest()->get();
        return view('admin.pages.surat.index', [
            'title' => 'Data Surat',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.surat.create', [
            'title' => 'Tambah Surat'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'judul' => ['required'],
            'nomor' => ['required'],
            'isi' => ['required'],
            'tempat_waktu' => ['required']
        ]);

        $data = request()->all();
        Surat::create($data);
        return redirect()->route('admin.surat.index')->with('success', 'Surat berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Surat::findOrFail($id);
        return view('admin.pages.surat.edit', [
            'title' => 'Edit Surat',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        request()->validate([
            'judul' => ['required'],
            'nomor' => ['required'],
            'isi' => ['required'],
            'tempat_waktu' => ['required']
        ]);

        $data = request()->all();
        $item = Surat::findOrFail($id);
        $item->update($data);
        return redirect()->route('admin.surat.index')->with('success', 'Surat berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Surat::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.surat.index')->with('success', 'Surat berhasil dihapus.');
    }

    public function print($id)
    {
        $item = Surat::findOrFail($id);
        $pengaturan = Pengaturan::first();
        $pdf = Pdf::loadView('admin.pages.surat.print',[
                'title' => 'Cetak Surat',
                'item' => $item,
                'pengaturan' => $pengaturan
            ]);
        return $pdf->download('Surat ' . \Str::slug($item->judul) . '.pdf');
        // return view('admin.pages.surat.print', [
        //     'title' => 'Cetak Surat',
        //     'item' => $item,
        //     'pengaturan' => $pengaturan
        // ]);
    }
}
