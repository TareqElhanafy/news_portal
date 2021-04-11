<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGeneralinfoRequest extends FormRequest
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
            'logo'=>'required_without:id|mimes:png,jpg',
            'portal_name'=>'required|string|max:255',
            'address_en'=>'required|string|max:255',
            'address_ar'=>'required|string|max:255',
            'email'=>'required|email',
            'phone'=>'required|string'
        ];
    }
}
