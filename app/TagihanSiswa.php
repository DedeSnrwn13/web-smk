<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagihanSiswa extends Model
{
    use SoftDeletes;

    protected $table = 'tagihan_siswa';

    protected $fillable = ['jumlah_tagihan', 'siswa_id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
