<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['type_product_id','name','description','quality', 'amount', 'price','discount_price','unit','status'];
}
