<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidTime;
use App\Rules\ValidDate;

class AbsentByAdminFormRequest extends FormRequest
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
            'absent_from' => ['required', new ValidTime],
            'absent_to' => ['required', new ValidTime],
            'day' => ['required', new ValidDate],
            'reason' => 'required',
            'user_id' => 'required|numeric',
        ];
    }
}
