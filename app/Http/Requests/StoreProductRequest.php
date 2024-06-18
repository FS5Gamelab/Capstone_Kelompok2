<?php

namespace App\Http\Requests;

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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'pre_order' => 'required|boolean',
            'image' => 'nullable|image|mimes::jpeg,png,jpg,gif,svg|max:2048',
            'sub_category_id' => 'required|exists:sub_categories,code',
            'brand_id' => 'required|exists:brands,code',
            'expired_at' => 'nullable|date',
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'Name is required',
        'description.required' => 'Description is required',
        'width.required' => 'Width is required',
        'width.numeric' => 'Width must be a number',
        'height.required' => 'Height is required',
        'height.numeric' => 'Height must be a number',
        'weight.required' => 'Weight is required',
        'weight.numeric' => 'Weight must be a number',
        'length.required' => 'Length is required',
        'length.numeric' => 'Length must be a number',
        'stock.required' => 'Stock is required',
        'stock.integer' => 'Stock must be an integer',
        'price.required' => 'Price is required',
        'price.integer' => 'Price must be an integer',
        'pre_order.required' => 'Pre-Order is required',
        'image.image' => 'Image must be an image file',
        'image.max' => 'Image size must be less than 2048 kilobytes',
        'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
        'category_id.required' => 'Category is required',
        'category_id.exists' => 'Selected category does not exist',
        'brand_id.required' => 'Brand is required',
        'brand_id.exists' => 'Selected brand does not exist',
        'expired_at.date' => 'Expired date must be a valid date',
    ];
}

}
