<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nilai extends Model
{
    use SoftDeletes;

    protected $table = 'nilai';

    protected $fillable = [
        'nis',
        'siswa_id',
        'kelas_id',

        'mapel_id',
        'nilai_keterampilan',
        'nilai_pengetahuan',

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

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'mapel_id');
    }
}

// protected $fillable = [
//     'nis',
//     'siswa_id',
//     'kelas_id',

//     'ppai',
//     'kpai',

//     'ppkn',
//     'kpkn',

//     'pindonesia',
//     'kindonesia',

//     'pmtk',
//     'kmtk',

//     'psejarah',
//     'ksejarah',

//     'pinggris',
//     'kinggris',

//     'psbk',
//     'ksbk',

//     'ppjok',
//     'kpjok',

//     'psunda',
//     'ksunda',

//     'psimdig',
//     'ksimdig',

//     'pfisika',
//     'kfisika',

//     'pkimia',
//     'kkimia',

//     'pjurusan1',
//     'kjurusan1',

//     'pjurusan2',
//     'kjurusan2',

//     'pjurusan3',
//     'kjurusan3',

//     'akademik',
//     'integritas',
//     'religius',
//     'nasionalis',
//     'mandiri',
//     'gotong_royong',
//     'catatan',
//     'mitra_pkl',
//     'lokasi',
//     'lama_pkl',
//     'keterangan',
//     'ekskul',
//     'keterangan_ekskul',
// ];
