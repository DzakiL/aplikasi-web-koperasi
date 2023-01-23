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
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'anggota koperasi',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'pengawas',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'kepala desa',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'ketua bumdes',
            'guard_name' => 'web'
        ]);

        //Super Admin
        Role::create([
            'name' => 'super admin',
            'guard_name' => 'web'
        ]);
    }
}
