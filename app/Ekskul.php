<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ekskul extends Model
{
    use SoftDeletes;

    protected $table = 'ekskul';

    protected $fillable = [
        'nama',
        'keterangan',
    ];

    public function rapot()
	    {
	        return $this->hasOne(Rapot::class);
	    }

	    public function nilai()
	    {
	        return $this->hasOne(Nilai::class);
	    }
}
