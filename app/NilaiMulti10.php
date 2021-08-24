<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiMulti10 extends Model
{
    use SoftDeletes;

    protected $table = 'nilai_multi10';

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

        'pkimia',
        'kkimia',

        'pfisika',
        'kfisika',

        'psunda',
        'ksunda',

        'psejarah',
        'ksejarah',

        'psbk',
        'ksbk',

        'psimdig',
        'ksimdig',

        'psiskom',
        'ksiskom',

        'pjaringan',
        'kjaringan',

        'ppemrograman',
        'kpemrograman',

        'pdesain',
        'kdesain',

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
