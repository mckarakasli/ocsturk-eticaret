<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable=[
        'sirketadi','vergidairesi','vergino','adres','odemeseki','total','tax','subtotal','user_id','durum'
    ];

    public function orderDetails(){
        return $this->hasMany('App\Models\orderDetails');
    }
}
