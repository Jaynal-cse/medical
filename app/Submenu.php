<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $guarded = [];
    public function connect_to_menu_table(){
        return $this->belongsTo('App\Frontend','menu_id');
    }
}
