<?php

namespace App\Http\Requests;

use App\Rules\checkPersonalReference;
use Illuminate\Foundation\Http\FormRequest;

class PersonalReferenceRequest extends FormRequest
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
            //representative
            'name' => ['required','string','max:50'],
            'surname' => ['required','string','max:50'],
            'dni' => ['required','alpha_num','max:9'],
            'phone' => ['required','alpha_num','max:12'],
            'email' => ['email:dns,rfc'],
            'personal_reference_type_id' => ['required','alpha_num','exists:personal_reference_types,id', new checkPersonalReference],

            //address
            'address' => ['required','string','max:150'],
            'reference_place' => ['required','string','max:150'],
            'state_id' => ['required','alpha_num','exists:states,id'],
            'city_id' => ['prohibits:parish_id,township_id','nullable','alpha_num','exists:cities,id'],
            'township_id' => ['nullable','alpha_num','exists:townships,id'],
            'parish_id' => ['prohibits:city_id','alpha_num','nullable','exists:parishes,id'],
        ];
    }
}
