<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;

    protected $table = "jadwal";

    protected $fillable = [
        'semester',
        'tahun',
        'kelas_id',
        'mapel_id',
        'guru_id',
        'jam',
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function guru() {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
