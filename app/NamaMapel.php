<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamaMapel extends Model
{
    protected $table = 'nama_mapel';

    protected $fillable = [
        'nama',
    ];
}
