<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualMarket extends Model
{
    use HasFactory;

    protected $table = "virtual_markets";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
//    public function products()
//    {
//        return $this->hasMany('App\Models\Product');
//    }
    public function stores()
    {
        return $this->hasMany('App\Models\Store');
    }

}
