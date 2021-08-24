<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
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
            'kode_jurusan' => 'required|string|min:1',
            'nama' => 'required|min:2|max:50',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'required|string|min:10',
        ];
    }
}
