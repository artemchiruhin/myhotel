<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomCreateFormRequest extends FormRequest
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
            'number' => 'required|min:1|integer',
            'price_per_day' => 'required|min:1|numeric',
            'rooms_number' => 'required|min:1|integer',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required',
        ];
    }
}
