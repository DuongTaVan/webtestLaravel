<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'cmt_content', 'cmt_product_id ', 'cmt_admin_id ','cmt_user_id ','cmt_like','cmt_disk_like','parent_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'cmt_user_id');
    }
}
