<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsentFormRequest extends FormRequest
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
            'absent_from' => 'required|date_format: H:i:s',
            'absent_to' => 'required|date_format: H:i:s',
            'day' => 'required|date_format: Y-m-d',
            'reason' => 'required',
        ];
    }
}
