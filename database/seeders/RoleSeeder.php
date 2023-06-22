<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin','Kepala Sekolah','Karyawan','Kepala TU'];
        foreach($roles as $role)
        {
            Role::create([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }
    }
}
