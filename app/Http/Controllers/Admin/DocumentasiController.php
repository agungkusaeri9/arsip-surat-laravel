<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documentasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class DocumentasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Documentasi Read')->only('index');
        $this->middleware('can:Documentasi Create')->only(['create','store']);
        $this->middleware('can:Documentasi Update')->only(['edit','update']);
        $this->middleware('can:Documentasi Delete')->only('destroy');
        $this->middleware('can:Documentasi Detail')->only('show');
    }

    public function index()
    {
        $items = Documentasi::get();

        return view('admin.pages.documentasi.index', [
            'title' => 'Data Dokumentasi',
            'items' => $items,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.pages.documentasi.create', [
            'title' => 'Tambah Dokumentasi',
            'roles' => $roles
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
            'role_id' => ['required','unique:dokumentasi,role_id'],
            'isi' => ['required']
        ]);

        $data = request()->all();
        Documentasi::create($data);
        return redirect()->route('admin.documentasi.index')->with('success', 'Dokumentasi berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $item = Documentasi::where('role_id',auth()->user()->roles()->first()->id)->first();
        return view('admin.pages.documentasi.show', [
            'title' => 'Detail Dokumentasi',
            'item' => $item
        ]);
    }

    public function edit($id)
    {
        $item = Documentasi::findOrFail($id);
        $roles = Role::get();
        return view('admin.pages.documentasi.edit', [
            'title' => 'Edit Dokumentasi',
            'item' => $item,
            'roles' => $roles
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
            'role_id' => ['required',Rule::unique('dokumentasi','role_id')->ignore($id)],
            'isi' => ['required']
        ]);

        $data = request()->all();
        $item = Documentasi::findOrFail($id);
        $item->update($data);
        return redirect()->route('admin.documentasi.index')->with('success', 'Dokumentasi berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Documentasi::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.documentasi.index')->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
