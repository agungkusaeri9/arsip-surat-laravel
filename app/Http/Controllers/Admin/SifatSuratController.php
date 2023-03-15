<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SifatSurat;
use Illuminate\Http\Request;

class SifatSuratController extends Controller
{
    public function index()
    {
        $items = SifatSurat::orderBy('sifat', 'ASC')->get();
        return view('admin.pages.sifat-surat.index', [
            'title' => 'Data Sifat Surat',
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
        return view('admin.pages.sifat-surat.create', [
            'title' => 'Tambah Sifat Surat'
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
            'sifat' => ['required'],
        ]);

        $data = request()->all();
        SifatSurat::create($data);
        return redirect()->route('admin.sifat-surat.index')->with('success', 'Sifat Surat berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = SifatSurat::findOrFail($id);
        return view('admin.pages.sifat-surat.edit', [
            'title' => 'Edit Sifat Surat',
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
            'sifat' => ['required']
        ]);

        $data = request()->all();
        $item = SifatSurat::findOrFail($id);
        $item->update($data);
        return redirect()->route('admin.sifat-surat.index')->with('success', 'Sifat Surat berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SifatSurat::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.sifat-surat.index')->with('success', 'Sifat Surat berhasil dihapus.');
    }
}
