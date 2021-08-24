<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPembayaran extends Model
{
    use SoftDeletes;

    protected $table = 'jenis_pembayaran';

    protected $fillable = [
        'no',
        'jenis_pembayaran',
        'jumlah',
    ];

}
