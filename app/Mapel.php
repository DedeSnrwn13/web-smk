<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use SoftDeletes;

    protected $table = 'mapel';

    protected $fillable = [
        'kode_mapel',
        'mata_pelajaran',
        'detail_mapel',
        'kelas_id',
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function materi() {
        return $this->hasMany(Materi::class);
    }

    public function jadwal() {
        return $this->hasMany(Jadwal::class);
    }

    public function rpp()
    {
        return $this->hasMany(Rpp::class);
    }

    public function nilai()
	{
	    return $this->belongsTo(Nilai::class);
	}
}
