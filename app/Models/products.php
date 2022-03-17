<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','image','slug',
        'content','sale_price','regular_price',
        'price','stock_no','categories_id','brands','stock','tax'
    ];
}

