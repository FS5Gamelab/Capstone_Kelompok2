<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'value' => 'required|integer',
            'max_value' => 'required|integer',
            'applied_to' => 'required|string',
            'started_at' => 'required|date',
            'expired_at' => 'required|date',
            "product_id" => 'exists:products,code',
            "sub_category_id" => 'exists:sub_categories,code',
            "category_id" => 'exists:categories,code',
            "brand_id" => 'exists:brands,code',
            "global_id" => 'nullable'
        ];

    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.unique' => 'Name is already taken',
            'type.required' => 'Type is required',
            'type.in' => 'Type is invalid',
            'rules.required' => 'Rules is required',
            'amount.required' => 'Amount is required',
            'max_amount.required' => 'Max Amount is required',
            'availability.required' => 'Availability is required',
            'is_global.required' => 'Is Global is required',
            'started_at.required' => 'Started At is required',
            'expired_at.required' => 'Expired At is required',
        ];
    }
}
