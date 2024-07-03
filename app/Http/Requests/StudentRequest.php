<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'birthday' => ['required', 'date'],
            'section_id' => ['required', 'alpha_num', 'exists:sections,id'],
            'grade_id' => ['required', 'alpha_num', 'exists:grades,id'],
            'school_id' => ['required', 'alpha_num', 'exists:schools,id'],
        ];
    }
}
