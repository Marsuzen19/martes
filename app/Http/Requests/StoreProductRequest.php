<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //solucion de error 403 en postam cambie el false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, /*ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'category_id' => 'required|exists:categories,id',
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'sku'         => 'required|string|max:255',
        'price'       => 'required|numeric|min:0',
        'is_active'   => 'boolean'
        ];
    }
}
