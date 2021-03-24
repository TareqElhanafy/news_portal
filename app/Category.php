<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_en', 'name_ar'
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
