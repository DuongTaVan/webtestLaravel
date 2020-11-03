<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'p_name', 'p_slug', 'p_avatar','p_desc','p_content','p_price','p_image','t_id','c_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'c_id');
    }
    public function trademart(){
        return $this->belongsTo(Trademark::class, 't_id');
    }
}
