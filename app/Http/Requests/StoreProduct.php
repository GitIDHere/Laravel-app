<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'product_title' => 'required|string|max:100',
          'category_id' => 'required|exists:categories',
          'product_price' => 'required|numeric|min:0.01',
          'stock_amount' => 'required|integer|min:1',
          'delivery_cost' => 'required|numeric',
          'short_description' => 'required|string|max:150',
          'full_description' => 'required|string|max:2000'
        ];
    }

    /**
     * Set the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
          //'title.required' => 'A title is required',
        ];
    }





}
