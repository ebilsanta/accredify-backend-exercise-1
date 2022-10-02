<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Gender implements Rule
{   
    private $genders = ['male', 'female'];

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return in_array(strtolower($value), $this->genders);
    }

    public function message()
    {
        return 'The patientGender is not "Male" or "Female" (case-insensitive).';
    }
}
