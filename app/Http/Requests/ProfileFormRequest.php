<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'fullname' => 'nullable|string|max:20', 
            'gender' => 'nullable|numeric', 
            'birthday' => 'nullable|date_format: Y-m-d',
            'phone' => 'nullable|string|max:11',
            'address' => 'nullable|string|max:200',
            'position' => 'nullable|string|max:10',
        ];
    }
}
