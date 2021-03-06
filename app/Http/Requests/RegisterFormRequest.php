<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'email' => 'required|string|email|max:50',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|regex:/8[0-9]{10}/',
            'password' => 'required|confirmed|string'
        ];
    }
}
