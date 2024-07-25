<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAcademicRequest extends FormRequest
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
            // 'matric_category' => 'required|string',
            // 'matric_year' => 'required|integer',
            // 'matric_percentage' => 'required|numeric|between:50,100',
            // // 'matric_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            // 'matric_certificate' => 'required',
            // 'intermediate_category' => 'required|string',
            // 'intermediate_year' => 'required|integer',
            // 'intermediate_percentage' => 'required|numeric|between:50,100',
            // 'intermediate_certificate' => 'required',
        ];
    }
}
