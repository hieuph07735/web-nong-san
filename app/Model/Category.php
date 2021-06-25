<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Category extends Model
{
    protected $fillable = ['name', 'type', 'image','status'];
    protected $table = 'categories';
}
