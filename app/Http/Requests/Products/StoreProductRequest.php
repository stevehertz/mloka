<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:191'],
            'description' => ['nullable'],
            'weight' => ['required', 'numeric'],
            'weigh_unit' => ['required', 'integer'],
            'length' => ['required', 'numeric'],
            'width' => ['required', 'numeric'],
            'height' => ['required', 'numeric'], 
            'size_unit' => ['required', 'integer']
        ];
    }
}
