<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['code','unit_id','price_entry','image','type_product_id','name','description','status',];
}
