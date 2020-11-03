<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'c_name', 'c_slug', 'c_avatar','c_description','c_hot','c_status','t_id',
    ];
}
