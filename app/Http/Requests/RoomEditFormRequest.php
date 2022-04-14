<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomEditFormRequest extends FormRequest
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
            'number' => 'required|integer|min:100',
            'price_per_day' => 'required|numeric|min:1',
            'rooms_number' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
