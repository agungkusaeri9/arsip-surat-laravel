<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $items = SuratKeluar::latest()->get();
        return view('admin.pages.surat-keluar.index', [
            'title' => 'Data Surat Keluar',
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
        return view('admin.pages.surat-keluar.create', [
            'title' => 'Tambah Surat Keluar'
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
            'no_agenda' => ['required'],
            'penerima' => ['required'],
            'no_surat' => ['required', 'unique:surat_keluar,no_surat'],
            'isi' => ['required'],
            'keterangan' => ['required'],
            'tanggal_surat' => ['required'],
            'file' => ['mimes:pdf,docx', 'max:5048'],
        ]);



        $data = request()->all();
        request()->file('file') ? $data['file'] = request()->file('file')->store('surat-keluar', 'public') : $data['file'] = NULL;
        $sm_akhir = SuratKeluar::latest()->first();
        if ($sm_akhir) {
            $kode_akhiran =  \Str::substr($sm_akhir->kode, 3);
            $data['kode'] = 'SK' .  str_pad($kode_akhiran + 1, 3, '000', STR_PAD_LEFT);
        } else {
            $data['kode'] = 'SK' . '001';
        }


        SuratKeluar::create($data);
        return redirect()->route('admin.surat-keluar.index')->with('success', 'Surat Keluar berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = SuratKeluar::findOrFail($id);
        return view('admin.pages.surat-keluar.show', [
            'title' => 'Detail Surat Keluar',
            'item' => $item
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = SuratKeluar::findOrFail($id);
        return view('admin.pages.surat-keluar.edit', [
            'title' => 'Edit Surat Keluar',
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
            'no_agenda' => ['required', Rule::unique('surat_keluar', 'no_agenda')->ignore($id)],
            'penerima' => ['required'],
            'no_surat' => ['required', Rule::unique('surat_keluar', 'no_surat')->ignore($id)],
            'isi' => ['required'],
            'keterangan' => ['required'],
            'tanggal_surat' => ['required'],
            'file' => ['mimes:pdf,docx', 'max:5048'],
        ]);

        $data = request()->except(['file']);
        $item = SuratKeluar::findOrFail($id);
        if (request()->file('file')) {
            $item->file ? Storage::disk('public')->delete($item->file) : '';
            $data['file'] = request()->file('file')->store('surat-keluar', 'public');
        }

        $item->update($data);
        return redirect()->route('admin.surat-keluar.index')->with('success', 'Surat Keluar berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SuratKeluar::findOrFail($id);
        $item->file ? Storage::disk('public')->delete($item->file) : '';
        $item->delete();
        return redirect()->route('admin.surat-keluar.index')->with('success', 'Surat Keluar berhasil dihapus.');
    }

    public function print($kode)
    {

        $item = SuratKeluar::where('kode', $kode)->firstOrFail();

        if ($item->file) {

            $file = Storage::disk('public')->get($item->file);
            return (new Response($file, 200))
                ->header('Content-Type', 'application/pdf');
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }

    public function download($kode)
    {
        $item = SuratKeluar::where('kode', $kode)->firstOrFail();
        if ($item->file) {
            $filePath = public_path('storage/') . $item->file;
            $headers = ['Content-Type:','application/pdf'];
            $fileName = 'Surat-keluar-' . $item->kode . '.pdf';

            if (!file_exists($filePath)) {
                return redirect()->back()->with('gagal', 'Downloading Failed.');
            }
            return response()->download($filePath, $fileName, $headers);
        } else {
            return redirect()->back()->with('gagal', 'File Tidak Ditemukan.');
        }
    }
}
