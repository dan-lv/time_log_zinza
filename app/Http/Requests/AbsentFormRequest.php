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
            'absent-from' => 'required',
            'absent-to' => 'required',
            'day' => 'required',
            'reason' => 'required',
        ];
    }
}
