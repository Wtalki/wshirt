<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','user_id','product_id','quantity','orderCode','image','total_price'];

    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
