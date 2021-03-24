<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name_en', 'name_ar'
    ];

    public function subdistricts()
    {
        return $this->hasMany(SubDistrict::class, 'district_id');
    }
}
