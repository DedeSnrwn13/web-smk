<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiMutu10 extends Model
{
    use SoftDeletes;

    protected $table = 'nilai_mutu10';

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

        'pbiologi',
        'kbiologi',

        'ppenanganan',
        'kpenanganan',

        'ppengolahan',
        'kpengolahan',

        'ppertanian',
        'kpertanian',

        'ppengendalian',
        'kpengendalian',

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
