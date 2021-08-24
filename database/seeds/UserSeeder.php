<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'roles'    => 'ADMIN',
                'name'     => 'Ini Admin',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('admin12345'),
                'remember_token' => Str::random(40)
            ],
            [
                'roles'    => 'KEPSEK',
                'name'     => 'Ini Kepsek',
                'email'    => 'kepsek@gmail.com',
                'password' => Hash::make('kepsek12345'),
                'remember_token' => Str::random(40)
            ],
            [
                'roles'    => 'KURIKULUM',
                'name'     => 'Ini Kurikulum',
                'email'    => 'kurikulum@gmail.com',
                'password' => Hash::make('kurikulum12345'),
                'remember_token' => Str::random(40)
            ],
            [
                'roles'    => 'BENDAHARA',
                'name'     => 'Ini bendahara',
                'email'    => 'bendahara@gmail.com',
                'password' => Hash::make('bendahara12345'),
                'remember_token' => Str::random(40)
            ],
            [
                'roles'    => 'GURU',
                'name'     => 'Ini guru',
                'email'    => 'guru@gmail.com',
                'password' => Hash::make('guru12345'),
                'remember_token' => Str::random(40)
            ],
            [
                'roles'    => 'SISWA',
                'name'     => 'Ini siswa',
                'email'    => 'siswa@gmail.com',
                'password' => Hash::make('siswa12345'),
                'remember_token' => Str::random(40)
            ],
        ]);

        DB::table('admin')->insert([
            'user_id'       => 1,
            'nip'           => 11223300,
            'nama'          => 'Ini Admin',
            'alamat_1'      => 'Kp. Admin, Desa Admin',
            'alamat_2'      => 'Kec. Admin',
            'provinsi'      => null,
            'kabkota'       => null,
            'no_hp'         => null,
            'tempat_lahir'  => null,
            'tanggal_lahir' => null,
            'profile'       => null,
            'ktp'           => null,
        ]);
    }
}
