<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'district_id' => 'required|exists:districts,id',
            'subdistrict_id' => 'nullable|exists:sub_districts,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'image' => 'required_without:id|mimes:png,jpg',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'tags_en' => 'nullable|string',
            'tags_ar' => 'nullable|string',
            'headline' => 'nullable|integer',
            'first_section' => 'nullable|integer',
            'first_section_thumbnail' => 'nullable|integer',
            'bigthumbnail' => 'nullable|integer',
        ];
    }
}
