<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportGood extends Model
{
    protected $table = 'improt_goods';
    protected $fillable = ['product_price_id','quanlity','start_time','end_time'];
    protected $timestamps = true;
}
