<?php

namespace App\Rules;

use App\Http\Controllers\UserService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaximumAmount implements ValidationRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    private $userService;

    public function __construct()
    {
        $this->userService = new UserService;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if ($value > $this->userService->getMaximumLoanAmount()) {
            $fail('El monto excede el limite del usuario');
        }
    }
}
