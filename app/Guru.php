<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $table = 'guru';

    protected $fillable = [
        'user_id',
        'nik',
        'nip',
        'nama',
        'nuptk',
        'alamat_1',
        'alamat_2',
        'provinsi',
        'kabkota',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'profile',
        'ktp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal() {
        return $this->belongsTo(Jadwal::class);
    }

    public function rpp()
    {
        return $this->hasMany(Rpp::class);
    }
}
