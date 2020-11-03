<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'cp_name', 'cp_code', 'cp_type','cp_status','cp_number',
    ];
}
