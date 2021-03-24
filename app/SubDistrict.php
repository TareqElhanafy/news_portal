<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    protected $fillable = [
        'district_id', 'name_en', 'name_ar'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
