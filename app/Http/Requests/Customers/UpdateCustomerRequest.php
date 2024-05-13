<?php

namespace App\Http\Requests\Customers;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            //
            'first_name' => ['required', 'string'],
            'last_name' => ['nullable', 'string'],
            'phone' => ['required', 'numeric', Rule::unique('users')->ignore($this->route('customer'))],
            'email' => ['nullable', 'email', Rule::unique('users')->ignore($this->route('customer'))],
            'location' => ['required']
        ];
    }
}
