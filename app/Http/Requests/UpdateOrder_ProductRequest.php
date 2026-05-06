<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder_ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//solucion de error 403 en postam cambie el false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'order_id'   => 'required|exists:orders,id', 
        'product_id' => 'required|exists:products,id', 
        'quantity'   => 'required|integer|min:1', 
        'price'      => 'required|numeric|min:0'
        ];
    }
}
