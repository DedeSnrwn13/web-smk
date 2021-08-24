<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiMulti11 extends Model
{
    use SoftDeletes;

    protected $table = 'nilai_multi11';

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

        'ppkk',
        'kpkk',

        'ppercetakan',
        'kpercetakan',

        'panimasi',
        'kanimasi',

        'akademik',
        'integritas',
        'religius',
        'nasionalis',
        'mandiri',
        'gotong_royong',
        'catatan',

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
