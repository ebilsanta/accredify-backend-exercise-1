<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Iso8601Utc implements Rule
{
    private $ISO_8601_FULL = "/^\d{4}-\d\d-\d\dT\d\d:\d\d:\d\d(\.\d+)?(([+-]\d\d:\d\d)|Z)?$/i";

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return preg_match($this->ISO_8601_FULL, $value);

    }

    public function message()
    {
        return 'The collectedDateTime is not an ISO-8601 UTC String.';
    }
}
