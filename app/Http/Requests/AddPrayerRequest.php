<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPrayerRequest extends FormRequest
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
            'fajr' => 'string|max:255',
            'duhr' => 'string|max:255',
            'asr' => 'string|max:255',
            'magrib' => 'string|max:255',
            'esha' => 'string|max:255',
            'jummah' => 'string|max:255',
        ];
    }
}
