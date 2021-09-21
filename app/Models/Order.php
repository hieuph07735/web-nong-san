<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'oders';

    protected $fillable = ['date_order', 'total_price','customer_id','note'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Định nghĩa quan hệ cho order (one to one)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
