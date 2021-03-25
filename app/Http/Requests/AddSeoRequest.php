<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSeoRequest extends FormRequest
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
            'meta_title' => 'string|max:255',
            'meta_author' => 'string|max:255',
            'meta_description' => 'string|max:255',
            'meta_tag' => 'string|max:255',
            'google_analytics' => 'string|max:255',
            'bing_analytics' => 'string|max:255',
        ];
    }
}
