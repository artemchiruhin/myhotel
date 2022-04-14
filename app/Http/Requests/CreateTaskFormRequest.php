<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskFormRequest extends FormRequest
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
            'main_text' => 'required|exists:position_activity,activity',
            'date_from' => 'required|date|after:yesterday',
            'time_from' => 'required|date_format:H:i',
            'date_to' => 'required|date|after_or_equal:date_from',
            'time_to' => 'required|date_format:H:i',
        ];
    }
}
