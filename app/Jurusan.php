<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use SoftDeletes;

    protected $table = 'jurusan';

    protected $fillable = ['kode_jurusan', 'nama', 'logo', 'deskripsi'];

    public function siswa() {
        return $this->hasOne(Siswa::class);
    }

    public function kelas() {
        return $this->hasMany(Kelas::class);
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }
}
