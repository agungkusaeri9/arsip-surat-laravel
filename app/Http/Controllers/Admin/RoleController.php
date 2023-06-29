<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Role Read')->only('index');
        $this->middleware('can:Role Create')->only(['create','store']);
        $this->middleware('can:Role Update')->only(['edit','update']);
        $this->middleware('can:Role Delete')->only('destroy');
        $this->middleware('can:Role Permission')->only(['edit_role_permission','update_role_permission']);
    }

    public function index()
    {
        $items = Role::get();
        return view('admin.pages.role.index', [
            'title' => 'Data Role',
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
        return view('admin.pages.role.create', [
            'title' => 'Tambah Role'
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
        Role::create($data);
        return redirect()->route('admin.roles.index')->with('success', 'Role berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Role::findOrFail($id);
        return view('admin.pages.role.edit', [
            'title' => 'Edit Role',
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
        $item = Role::findOrFail($id);
        $item->update($data);
        return redirect()->route('admin.roles.index')->with('success', 'Role berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Role::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role berhasil dihapus.');
    }

    public function edit_role_permission()
    {
        $item = Role::with('permissions')->where('name', request('role_name'))->firstOrFail();
        $role_permission = $item->permissions()->pluck('id');
        return view('admin.pages.role.role-permission', [
            'title' => 'Edit Role Permission',
            'item' => $item,
            'permissions' => Permission::whereNotIn('id', $role_permission)->orderBy('name', 'ASC')->get()
        ]);
    }

    public function update_role_permission()
    {
        request()->validate([
            'role_name' => ['required'],
            'permission' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->only(['role_name', 'permission']);
            $role = Role::where('name', $data['role_name'])->firstOrFail();
            $role->syncPermissions($data['permission']);

            DB::commit();
            return redirect()->back()->with('success', 'Permisison berhasil diupdate.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'System Error!.');
        }
    }
}
