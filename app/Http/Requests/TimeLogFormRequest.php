<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidTime;
use App\Rules\ValidDate;

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
            'check_in_time' => ['required', new ValidTime],
            'check_out_time' => ['required', new ValidTime],
            'day' => ['required', new ValidDate],
            'user_id' => 'required|numeric',
        ];
    }
}
