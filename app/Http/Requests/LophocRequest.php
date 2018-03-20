<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LophocRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lophoc_name' => 'min:6|required';
            'begin_at' => 'required|date|after:today';
            'number_of_lesson' => 'required';
            'max_slot' => 'required';
        ];
    }
}
