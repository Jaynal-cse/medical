<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterHeading extends Model
{
    protected $guarded = [];
    function bed_asign()
    {
        return $this->hasOne(BedAssign::class,'bed_no','bed_no');
    }

    function footer_department()
    {
        return $this->hasOne(FooterDepartment::class, 'heading_id','id');
    }

    public function heading_items()
    {
        return $this->hasMany(FooterHeadingItem::class, 'heading_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
