<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuratMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Surat Masuk Read')->only('index');
        $this->middleware('can:Surat Masuk Create')->only(['create','store']);
        $this->middleware('can:Surat Masuk Update')->only(['edit','update']);
        $this->middleware('can:Surat Masuk Delete')->only('destroy');
    }

    public function index()
    {
        $items = SuratMasuk::latest()->get();
        return view('admin.pages.surat-masuk.index', [
            'title' => 'Data Surat Masuk',
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
        return view('admin.pages.surat-masuk.create', [
            'title' => 'Tambah Surat Masuk'
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
            'pengirim' => ['required'],
            'no_surat' => ['required', 'unique:surat_masuk,no_surat'],
            'isi' => ['required'],
            'keterangan' => ['required'],
            'tanggal_surat' => ['required'],
            'tanggal_diterima' => ['required'],
            'file' => ['mimes:pdf,docx', 'max:5048'],
        ]);



        $data = request()->all();
        request()->file('file') ? $data['file'] = request()->file('file')->store('surat-masuk', 'public') : $data['file'] = NULL;
        $sm_akhir = SuratMasuk::latest()->first();
        if ($sm_akhir) {
            $kode_akhiran =  \Str::substr($sm_akhir->kode, 3);
            $data['kode'] = 'SM' .  str_pad($kode_akhiran + 1, 3, '000', STR_PAD_LEFT);
        } else {
            $data['kode'] = 'SM' . '001';
        }


        SuratMasuk::create($data);
        return redirect()->route('admin.surat-masuk.index')->with('success', 'Surat Masuk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = SuratMasuk::findOrFail($id);
        return view('admin.pages.surat-masuk.show', [
            'title' => 'Detail Surat Masuk',
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
        $item = SuratMasuk::findOrFail($id);
        return view('admin.pages.surat-masuk.edit', [
            'title' => 'Edit Surat Masuk',
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
            'no_agenda' => ['required', Rule::unique('surat_masuk', 'no_agenda')->ignore($id)],
            'pengirim' => ['required'],
            'no_surat' => ['required', Rule::unique('surat_masuk', 'no_surat')->ignore($id)],
            'isi' => ['required'],
            'keterangan' => ['required'],
            'tanggal_surat' => ['required'],
            'tanggal_diterima' => ['required'],
            'file' => ['mimes:pdf,docx', 'max:5048'],
        ]);

        $data = request()->except(['file']);
        $item = SuratMasuk::findOrFail($id);
        if (request()->file('file')) {
            $item->file ? Storage::disk('public')->delete($item->file) : '';
            $data['file'] = request()->file('file')->store('surat-masuk', 'public');
        }

        $item->update($data);
        return redirect()->route('admin.surat-masuk.index')->with('success', 'Surat Masuk berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SuratMasuk::findOrFail($id);
        $item->file ? Storage::disk('public')->delete($item->file) : '';
        $item->delete();
        return redirect()->route('admin.surat-masuk.index')->with('success', 'Surat Masuk berhasil dihapus.');
    }

    public function print($kode)
    {

        $item = SuratMasuk::where('kode', $kode)->firstOrFail();

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
        $item = SuratMasuk::where('kode', $kode)->firstOrFail();
        if ($item->file) {
            $filePath = public_path('storage/') . $item->file;
            $headers = ['Content-Type:','application/pdf'];
            $fileName = 'Surat-masuk-' . $item->kode . '.pdf';

            if (!file_exists($filePath)) {
                return redirect()->back()->with('gagal', 'Downloading Failed.');
            }
            return response()->download($filePath, $fileName, $headers);
        } else {
            return redirect()->back()->with('gagal', 'File Tidak Ditemukan.');
        }
    }
}
