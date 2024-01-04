<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProductAssetRequest extends FormRequest
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
            'product_id' => 'required|integer|min:0|digits_between:1,20',
            'image' => 'required|string',
        ];
    }

    /**
     * Get the validation messages apply by rules.
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
    
    /**
     * Get the validation messages apply by rules.
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'fail',
            'message' => 'Validation errors',
            'data'    => $validator->errors()
        ], 422));
    }
}
