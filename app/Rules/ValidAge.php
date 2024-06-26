<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class ValidAge implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $eighteenYearsAgo = now()->subYears(18);

        $birthdate = Carbon::parse($value);

    
        return $birthdate->lessThan($eighteenYearsAgo);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Você deve ter pelo menos 18 anos de idade.';
    }
}
