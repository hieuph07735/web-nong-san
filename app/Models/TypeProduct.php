<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = 'type_products';
    protected $fillable = ['category_id','name','description','image','status'];
}
