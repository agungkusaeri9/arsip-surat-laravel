<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Permission Read')->only('index');
        $this->middleware('can:Permission Create')->only(['create','store']);
        $this->middleware('can:Permission Update')->only(['edit','update']);
        $this->middleware('can:Permission Delete')->only('destroy');
    }

    public function index()
    {
        $items = Permission::get();
        return view('admin.pages.permission.index', [
            'title' => 'Data Permission',
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
        return view('admin.pages.permission.create', [
            'title' => 'Tambah Permission'
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
            'name' => ['required'],
        ]);

        $data = request()->all();
        Permission::create($data);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Permission::findOrFail($id);
        return view('admin.pages.permission.edit', [
            'title' => 'Edit Permission',
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
            'name' => ['required']
        ]);

        $data = request()->all();
        $item = Permission::findOrFail($id);
        $item->update($data);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Permission::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Permission berhasil dihapus.');
    }
}
