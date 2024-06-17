<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'value' => 'required|integer',
            'max_value' => 'required|integer',
            'applied_to' => 'required|string',
            'started_at' => 'required|date',
            'expired_at' => 'required|date'
        ];

        if($this->get('applied_to') === "product"){
            $rules['referenceCode'] = 'required|exists:products,code';
        } else if($this->get('applied_to') === "subCategory"){
            $rules['referenceCode'] = 'required|exists:sub_categories,code';
        } else if($this->get('applied_to') === "category"){
            $rules['referenceCode'] = 'required|exists:categories,code';
        } else if($this->get('applied_to') === "brand"){
            $rules['referenceCode'] = 'required|exists:brands,code';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'type.required' => 'Type is required',
            'type.in' => 'Type is invalid',
            'value.required' => 'Amount is required',
            'max_value.required' => 'Max Amount is required',
            'applied_to.required' => 'Applied To is required',
            'referenceCode.required' => 'Reference To is required',
            'started_at.required' => 'Started At is required',
            'expired_at.required' => 'Expired At is required',
        ];
    }
}
