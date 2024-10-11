<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaccineRegisterRequest extends FormRequest
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
            'center_id' => 'required|integer|exists:vaccine_centers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:vaccine_registers,email',
            'nid' => 'required|string|max:25|unique:vaccine_registers,nid',
        ];
    }
    public function messages()
    {
        return [
            'center_id' => 'Please select a center',
            'nid.unique' => 'You are already registered for vaccine',
        ];
    }
}
