<?php

namespace App\Http\Requests;

use App\Rules\MaximumAmount;
use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gross_amount' => ['required','decimal:2',new MaximumAmount],
            'flat_commission' => ['required','decimal:2'],
            'net_amount' => ['required','decimal:2'],
            'term' => ['required','numeric','integer'],
        ];
    }
}
