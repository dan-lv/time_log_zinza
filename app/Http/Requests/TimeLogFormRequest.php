<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeLogFormRequest extends FormRequest
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
            'check_in_time' => 'required|date_format: H:i:s',
            'check_out_time' => 'required|date_format: H:i:s',
            'day' => 'required|date_format: Y-m-d',
            'user_id' => 'required|numeric',
        ];
    }
}
