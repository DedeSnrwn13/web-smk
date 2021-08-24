<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    protected $table = "admin";

    protected $fillable = [
        'user_id',
        'nip',
        'nama',
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

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
