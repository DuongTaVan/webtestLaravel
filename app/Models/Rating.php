<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'r_user_id');
    }
}
