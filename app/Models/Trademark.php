<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $fillable = [
        't_name', 't_slug', 't_avatar','t_hot','t_status'
    ];
}
