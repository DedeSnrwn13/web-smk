<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
