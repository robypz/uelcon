<?php

namespace App\Rules;

use App\Http\Controllers\UserService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class checkPersonalReference implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (UserService::checkPersonalReferenceType($value) == 2) {
            $fail('Ya tienes el maximo de referencias para este tipo');
        }
    }
}
