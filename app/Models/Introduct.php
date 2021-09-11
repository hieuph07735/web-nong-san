<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Introduct extends Model
{
    protected $table = 'introducts';
    protected $fillable = ['title','content','image','status'];
}
