<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'jurusan_id',
        'kelas_id',
        'nis',
        'nisn',
        'nama',
        'alamat_1',
        'alamat_2',
        'provinsi',
        'kabkota',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_dalam_keluarga',
        'anak_ke',
        'pada_tanggal',
        'profile',
        'nama_ayah',
        'nama_ibu',
        'alamat_ortu',
        'nohp_rumah',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'nama_wali',
        'alamat_wali',
        'nohp_wali',
        'pekerjaan_wali',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }

    public function tagihan() {
        return $this->hasMany(TagihanSiswa::class);
    }

    public function jurusan() {
        return $this->belongsTo('App\Jurusan', 'jurusan_id', 'id');
    }

    public function kelas() {
        return $this->belongsTo('App\Kelas', 'kelas_id', 'id');
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
