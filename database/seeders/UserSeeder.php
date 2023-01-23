<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //anggota
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'user_name' => 'dwiky',
            'password' => Hash::make('tes11')
        ]);
        $admin->assignRole('admin');

        //anggota
        $anggota = User::create([
            'name' => 'anggota',
            'email' => 'anggota@gmail.com',
            'user_name' => 'anggota',
            'password' => Hash::make('tes11')
        ]);
        $anggota->assignRole('anggota koperasi');

        //pengawas
        $pengawas = User::create([
            'name' => 'pengawas',
            'email' => 'pengawas@gmail.com',
            'user_name' => '11pengawas',
            'password' => Hash::make('tes11')
        ]);
        $pengawas->assignRole('pengawas');

        // kades
        $kades = User::create([
            'name' => 'kades',
            'email' => 'kades@gmail.com',
            'user_name' => '1kades',
            'password' => Hash::make('tes11')
        ]);
        $kades->assignRole('kepala desa');

        //bumdes
        $bumdes = User::create([
            'name' => 'ketua bumdes',
            'email' => 'bumdes@gmail.com',
            'user_name' => 'bumdes',
            'password' => Hash::make('tes11')
        ]);
        $bumdes->assignRole('ketua bumdes');

        //super admin
        $SU = User::create([
            'name' => 'super admin',
            'email' => 'super@gmail.com',
            'user_name' => 'superAdmin',
            'password' => Hash::make('tes11')
        ]);
        $SU->assignRole('super admin');
    }
}
