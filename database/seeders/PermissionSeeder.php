<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Dashboard',
            'Surat Read','Surat Create','Surat Update','Surat Delete','Surat Print',
            'Klasifikasi Read','Klasifikasi Create','Klasifikasi Update','Klasifikasi Delete',
            'Sifat Read','Sifat Create','Sifat Update','Sifat Delete',
            'Surat Masuk Read','Surat Masuk Create','Surat Masuk Update','Surat Masuk Delete','Surat Masuk Detail',
            'Disposisi Read','Disposisi Create','Disposisi Update','Disposisi Delete',
            'Surat Keluar Read','Surat Keluar Create','Surat Keluar Update','Surat Keluar Delete','Surat Keluar Detail',
            'Buku Agenda Surat Masuk Read','Buku Agenda Surat Keluar Read',
            'User Read','User Create','User Update','User Delete',
            'Setting Read','Setting Update',
            'Permission Read','Permission Create','Permission Update','Permission Delete',
            'Role Read','Role Create','Role Update','Role Delete','Role Permission',
            'Documentasi Read','Documentasi Create','Documentasi Update','Documentasi Delete','Documentasi Detail',
        ];

        foreach($permissions as $permission)
        {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
