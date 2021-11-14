<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendDoctor extends Model
{
    protected $guarded = [];

    public function get_service()
    {
        return $this->belongsTo(FrontendSection5Department::class, 'service_name_id','id');
    }
}
