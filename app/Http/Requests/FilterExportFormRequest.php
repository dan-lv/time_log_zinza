<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterExportFormRequest extends FormRequest
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
            'month' => 'required|in: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12',
            'operator_month' => 'required|in: 0, 1, 2, 3, 4',
            'operator_year' => 'required|in: 0, 1, 2, 3, 4',
            'year' => 'required|regex: /[0-9]/',
        ];
    }
}
