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
            'seller_name' => 'required|string|regex:/^[\pL\ -\']+$/u|max:50',
            'company_name' => 'required|string|max:50|unique:sellers',
            'company_email' => 'required|email|max:100|unique:sellers',

            'address_line_1' => 'required|string|max:150',
            'address_line_2' => 'string|max:150',
            'city' => 'required|string|alpha|max:150',
            
            'postcode' => 'required|regex:/[A-Za-z]{1,2}[0-9][0-9A-Za-z]?\s?[0-9][A-Za-z]{2}/u|string|min:5|max:15'
        ];
    }
}
