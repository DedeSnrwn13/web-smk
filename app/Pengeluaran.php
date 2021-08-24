<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengeluaran extends Model
{
    use SoftDeletes;

    protected $table = 'pengeluaran';

    protected $fillable = [
        'nama_transaksi',
        'tanggal',
        'keterangan',
        'jumlah',
        'harga ',
        'total'
    ];
}
