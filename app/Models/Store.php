<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['store_social_id'];
    public function virtual_market()
    {
        return $this->belongsTo('App\Models\VirtualMarket');
    }
}
