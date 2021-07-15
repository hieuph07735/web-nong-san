<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'oders';
    protected $fillable = ['user_id','name','phone','address','total_price'];
    protected $timestamps = true;
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
