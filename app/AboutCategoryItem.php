<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutCategoryItem extends Model
{
    protected $guarded = [];

    public function get_bullet_points()
    {
        return $this->hasMany(AboutBulletPoint::class, 'about_category_item_id', 'id');
    }

    public function get_category()
    {
        return $this->belongsTo(FrontendAboutCategory::class, 'about_category_id','id');
    }
}
