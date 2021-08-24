<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nis'           => 'required|unique:siswa|min:6|max:100',
            'nisn'          => 'required|unique:siswa|min:6|max:100',
            'nama'          => 'required|max:100|min:2',
            'alamat_1'      => 'required|min:6|max:150',
            'alamat_2'      => 'nullable|min:6|max:150',
            'provinsi'      => 'required',
            'kabkota'       => 'required',
            'no_hp'         => 'required|string|min:10|max:13',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'profile'       => 'nullable|file|mimes:jpeg,jpg|max:2048',
            'email'         => 'required|string|unique:users,email,',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'status_dalam_keluarga' => 'required',
            'anak_ke'          => 'required',
            'tanggal_lahir'    => 'required',
            'pada_tanggal'     => 'required',
            'nama_ayah'        => 'required',
            'nama_ibu'         => 'required',
            'alamat_ortu'      => 'required',
            'nohp_rumah'       => 'nullable|unique:siswa,nohp_rumah,',
            'pekerjaan_ayah'   => 'required',
            'pekerjaan_ibu'    => 'required',
            'nama_wali'        => 'nullable',
            'alamat_wali'      => 'nullable',
            'nohp_wali'        => 'nullable|unique:siswa,nohp_wali,',
            'pekerjaan_wali'   => 'nullable',
        ];
    }
}
