<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::first();
        return view('admin.pages.pengaturan.index',[
            'title' => 'Pengaturan Web',
            'pengaturan' => $pengaturan
        ]);
    }

    public function update()
    {
        request()->validate([
            'nama' => ['required'],
            'deskripsi' => ['required']
        ]);

        $data = request()->all();

        $pengaturan = Pengaturan::first();
        if(request()->file('gambar'))
        {
            $pengaturan->gambar ? Storage::disk('public')->delete($pengaturan->gambar) : '';
            $data['gambar'] = request()->file('gambar')->store('pengaturan','public');
        }
        if(request()->file('foto_pembuat'))
        {
            $pengaturan->foto_pembuat ? Storage::disk('public')->delete($pengaturan->foto_pembuat) : '';
            $data['foto_pembuat'] = request()->file('foto_pembuat')->store('pengaturan','public');
        }

        $pengaturan->update($data);

        return redirect()->route('admin.pengaturan.index')->with('success','Pengaturan berhasil disimpan.');
    }
}
