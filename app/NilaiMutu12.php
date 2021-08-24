<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiMutu12 extends Model
{
    use SoftDeletes;

    protected $table = 'nilai_mutu12';

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

        'pmekanis',
        'kmekanis',

        'pbiologis',
        'kbiologis',

        'pinstrumental',
        'kinstrumental',

        'ppengujian',
        'kpengujian',

        'ppertanian',
        'kpertanian',

        'pkeamanan',
        'kkeamanan',

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
