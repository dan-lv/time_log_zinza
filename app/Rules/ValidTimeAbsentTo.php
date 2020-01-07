<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidTimeAbsentTo implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function passes($attribute, $value)
    {
        return $value > $this->request->get('absent_from');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Time absent to is invalid, please greater than absent from.';
    }
}
