<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasukan extends Model
{
    use SoftDeletes;

    protected $table = 'pemasukan';

    protected $fillable = [

        'tanggal',
        'kelas_id',
        'jurusan_id',
        'siswa_id',
        'jenis_pembayaran',
        'jumlah_pembayaran',
        'cicilan',
        'sisa ',
    ];

    public function siswa(){
      return $this->belongsTo(Siswa::class,'siswa_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
