<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSeller extends FormRequest
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
            'company_name' => 'required|string|max:50|unique:sellers',
            'address_1' => 'required|string|max:150',
            'address_2' => 'string|max:150',
            'street' => 'required|string|max:150',
            'city' => 'required|string|max:150',
            'postcode' => 'required|string|max:10',
        ];
    }
}
