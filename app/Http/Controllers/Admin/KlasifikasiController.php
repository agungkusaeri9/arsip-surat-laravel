<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Klasifikasi Read')->only('index');
        $this->middleware('can:Klasifikasi Create')->only(['create','store']);
        $this->middleware('can:Klasifikasi Update')->only(['edit','update']);
        $this->middleware('can:Klasifikasi Delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Klasifikasi::orderBy('nama', 'ASC')->get();
        return view('admin.pages.klasifikasi.index', [
            'title' => 'Data Klasifikasi',
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
        return view('admin.pages.klasifikasi.create', [
            'title' => 'Tambah Klasifikasi'
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
            'nama' => ['required'],
            'jabatan' => ['required'],
        ]);

        $data = request()->all();
        Klasifikasi::create($data);
        return redirect()->route('admin.klasifikasi.index')->with('success', 'Klasifikasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Klasifikasi::findOrFail($id);
        return view('admin.pages.klasifikasi.edit', [
            'title' => 'Edit Klasifikasi',
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
            'nama' => ['required'],
            'jabatan' => ['required'],
        ]);

        $data = request()->all();
        $item = Klasifikasi::findOrFail($id);
        $item->update($data);
        return redirect()->route('admin.klasifikasi.index')->with('success', 'Klasifikasi berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Klasifikasi::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.klasifikasi.index')->with('success', 'Klasifikasi berhasil dihapus.');
    }
}
