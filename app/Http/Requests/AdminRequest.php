<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'nip'           => 'nullable|unique:admin,nip|max:50|min:1',
            'nuptk'         => 'nullable|unique:admin,nuptk|min:1',
            'nama'          => 'required|max:100|min:2',
            'alamat_1'      => 'required|min:6|max:150',
            'alamat_2'      => 'nullable',
            'provinsi'      => 'required',
            'kabkota'       => 'required',
            'no_hp'         => 'required|string|min:10|max:13',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'profile'       => 'nullable|file|mimes:jpeg,jpg|max:2048',
            'ktp'           => 'nullable|file|mimes:jpeg,jpg|max:2048',
        ];
    }
}
