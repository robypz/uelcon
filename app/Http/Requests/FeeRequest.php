<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
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
            'payment_method_id' => ['required','exists:payment_methods,id'],
            'loan_id' => ['required','exists:loans,id'],
            'gross_amount' => ['required','decimal:2'],
            'interest_amount' => ['required','decimal:2'],
            'net_amount' => ['required','decimal:2'],
            'email' => ['nullable','prohibits:cash_image,'],
            'transaction_id' => ['nullable','prohibits:cash_image'],
            'cash_image' => ['nullable','prohibits:email,transaction_id','image'],
        ];
    }
}
