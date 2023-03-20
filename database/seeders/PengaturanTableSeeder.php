<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaturan::create([
            'nama' => 'Arsip Surat',
            'deskripsi' => 'Arsip Surat merupakan aplikasi berbasis web',
            'gambar' => NULL,
            'nama_pembuat' => 'user',
            'nim_pembuat' => '10000',
            'prodi_pembuat' => 'Manajemen',
            'email_pembuat' => 'user@gmail.com',
            'nomor_hp_pembuat' => '0891231231212',
            'foto_pembuat' => NULL
        ]);
    }
}
