<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Rapot extends Model
{

    protected $table = 'rapot';

    protected $fillable = [
        'nis',
        'siswa_id',
        'kelas_id',
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
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'nama', 'id');
    }
}
