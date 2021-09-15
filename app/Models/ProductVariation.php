<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariationType;

class ProductVariation extends Model
{
    public function type()
    {
        return $this->hasOne(ProductVariationType::class,'id','product_variation_types_id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function variationtype(){
        return $this->belongsTo(ProductVariationType::class, 'product_variation_types_id','id');
        // return $this->hasOne(ProductVariationType::class,'product_variation_types', 'id');
    }
}
