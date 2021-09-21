<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'oder_items';
    
    protected $fillable = ['product_id','oder_id','quanlity','price'];

    public $timestamps = true;
}
