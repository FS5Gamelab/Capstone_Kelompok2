<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'description' => 'required|string',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'length' => 'required|numeric',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|string',
            'category_id' => 'required|exists:sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'expired_at' => 'required|date',
            'image' => 'nullable|image|mimes::jpeg,png,jpg,gif,svg|max:2048',
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
            'price.required' => 'Price is required',
            'status.required' => 'Status is required',
            'category_id.required' => 'Category is required',
            'brand_id.required' => 'Brand is required',
            'discount_id.required' => 'Discount is required',
            'expired_at.required' => 'Expired date is required',
            'image.image' => 'Image must be an image file',
            'image.max' => 'Image size must be less than 2MB',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg',
        ];
    }
}
