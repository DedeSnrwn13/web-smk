<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nama_mapel')->insert([
            [
                'nama' => 'Pendidikan Agama dan Budi Pekerti',
            ],
            [
                'nama' => 'Pendidikan Pancasila dan Kewarganegaraan',
            ],
            [
                'nama' => 'Bahasa Indonesia',
            ],
            [
                'nama' => 'Matematika',
            ],
            [
                'nama' => 'Sejarah Indonesia',
            ],
            [
                'nama' => 'Bahasa Inggris dan Bahasa Asing Lainnya',
            ],
            [
                'nama' => 'Seni Budaya',
            ],
            [
                'nama' => 'Pendidikan Jasmani, Olahraga & Kesehatan',
            ],
            [
                'nama' => 'Bahasa Sunda',
            ],
            [
                'nama' => 'Bahasa Jepang',
            ],
            [
                'nama' => 'Simulasi dan Komunikasi Digital',
            ],
            [
                'nama' => 'Fisika',
            ],
            [
                'nama' => 'Kimia',
            ],
            [
                'nama' => 'Biologi',
            ],
            [
                'nama' => 'Sistem Komputer',
            ],
            [
                'nama' => 'Komputer dan Jaringan Dasar',
            ],
            [
                'nama' => 'Pemrograman Dasar',
            ],
            [
                'nama' => 'Dasar Desain Grafis',
            ],
            [
                'nama' => 'PKK',
            ],
            [
                'nama' => 'Desain Grafis Percetakan',
            ],
            [
                'nama' => 'Animasi 2D dan 3D',
            ],
            [
                'nama' => 'Desain Media Interaktif',
            ],
            [
                'nama' => 'Teknik Pengolahan Audio dan Video',
            ],
            [
                'nama' => 'Produk Kreatif dan Kewirausahaan',
            ],
            [
                'nama' => 'Dasar Penanganan Bahan Hasil Pertanian',
            ],
            [
                'nama' => 'Dasar Proses Pengolahan Hasil',
            ],
            [
                'nama' => 'Pertanian',
            ],
            [
                'nama' => 'Dasar Pengendalian Mutu Hasil Pertanian',
            ],
            [
                'nama' => 'Pengambilan Contoh dan Pengujian Fisik- Mekanis',
            ],
            [
                'nama' => 'Pengujian Secara Mikribiologis',
            ],
            [
                'nama' => 'Pengujian Secara Kimia dan Instrumental',
            ],
            [
                'nama' => 'Pengujian Mutu Pangan, Non Pangan, Air dan Limbah Industri',
            ],
        ]);
    }
}
