<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rpp extends Model
{
    use SoftDeletes;

    protected $table = 'rpp';

    protected $fillable = [
        'no',
        'nik',
        'guru_id',
        'mapel_id',
        'ki',
        'kd',
        'lampiran',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class, 'mapel_id');
    }
}
