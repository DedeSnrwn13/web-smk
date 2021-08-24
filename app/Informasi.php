<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informasi extends Model
{
    use SoftDeletes;

    protected $table = 'informasi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'lampiran',
    ];
}
