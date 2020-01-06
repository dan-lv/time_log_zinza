<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidTime;
use App\Rules\ValidDate;
use App\Rules\ValidTimeAbsentTo;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        return [
            'absent_from' => ['required', new ValidTime],
            'absent_to' => ['required', new ValidTime, new ValidTimeAbsentTo($request)],
            'day' => ['required', new ValidDate],
            'reason' => 'required',
            'user_id' => 'required|numeric',
        ];
    }
}
