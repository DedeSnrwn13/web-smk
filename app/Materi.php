<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use SoftDeletes;

    protected $table = 'materi';

    protected $fillable = [
        'no',
        'judul',
        'kelas_id',
        'mapel_id',
        'lampiran',
        'link',
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
