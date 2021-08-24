<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'          => 'required|max:100|min:2',
            'email'         => 'required|string|unique:users',
            'roles'         => 'required',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required_with:password|same:password|string|min:8',
        ];
    }
}
