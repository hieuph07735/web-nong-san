<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    protected $table = 'users_comments';
    protected $fillable = ['user_id','product_id','content'];
    protected $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
