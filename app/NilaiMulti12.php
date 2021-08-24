<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiMulti12 extends Model
{
    use SoftDeletes;

    protected $table = 'nilai_multi12';

    protected $fillable = [
        'nis',
        'siswa_id',
        'kelas_id',

        'pmtk',
        'kmtk',

        'ppai',
        'kpai',

        'kindonesia',
        'pindonesia',

        'ppkn',
        'kpkn',

        'pinggris',
        'kinggris',

        'pjepang',
        'kjepang',


        'pinteraktif',
        'kinteraktif',

        'paudio',
        'kaudio',

        'ppkk',
        'kpkk',

        'akademik',
        'integritas',
        'religius',
        'nasionalis',
        'mandiri',
        'gotong_royong',
        'catatan',

        'mitra_pkl',
        'lokasi',
        'lama_pkl',
        'keterangan',

        'ekskul',
        'keterangan_ekskul',
    ];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
