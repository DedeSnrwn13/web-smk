<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kelas',
        'jurusan_id',
        'jumlah_siswa',
    ];

    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function siswa() {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }

    public function mapels() {
        return $this->hasMany(Kelas::class);
    }

    public function jadwal() {
        return $this->hasMany(Jadwal::class);
    }

    public function materi() {
        return $this->hasMany(Materi::class);
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }

    	public function rapot()
	    {
	        return $this->hasOne(Rapot::class);
	    }

	    public function nilai()
	    {
	        return $this->hasOne(Nilai::class);
	    }
}
