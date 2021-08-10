<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function virtual_market()
    {
        return $this->belongsTo('App\Models\VirtualMarket');
    }
//    public function products(){
//        return $this->hasMany('App\Models\Product');
//    }
}
