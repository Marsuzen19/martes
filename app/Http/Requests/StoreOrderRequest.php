<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        'customer_id'      => 'required|exists:customers,id',
        'order_number' => 'required|string|max:255|unique:orders,order_number,' . $this->route('order'),
        'total_price'      => 'required|numeric|min:0', 
        'status'           => 'required|in:pending,paid,shipped,cancelled',
        'shipping_address' => 'required|string',
        'notes'            => 'nullable|string'
        ];
    }
}
