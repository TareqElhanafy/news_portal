<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id', 'subcategory_id', 'district_id', 'subdistrict_id', 'title_en', 'title_ar', 'user_id',
        'image', 'details_en', 'details_ar', 'tags_en', 'tags_ar', 'headline', 'first_section', 'first_section_thumbnail',
        'bigthumbnail', 'month', 'date',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function subdistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'subdistrict_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
