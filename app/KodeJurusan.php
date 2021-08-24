<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeJurusan extends Model
{
    protected $table = 'kode_jurusan';

    protected $fillable = [
        'kode',
        'nama_jurussan'
    ];
}
