<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name','phone','avatar','role','stastus','email','email_verified_at','password','remember_token'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function userComments(){
        return $this->hasMany(UserComment::class);
    }
}


