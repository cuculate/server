<?php

namespace Support\Rules;

use Illuminate\Contracts\Validation\Rule;

class Uuid implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i', strtoupper($value));
    }

    public function message()
    {
        return __('Uuid');
    }
}