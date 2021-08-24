<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kode_jurusan')->insert([
            [
                'kode' => 'A',
                'nama_jurusan' => 'Pengawasan Mutu Hasil Pertanian',
            ],
            [
                'kode' => 'E',
                'nama_jurusan' => 'Multimedia',
            ]
        ]);
    }
}
