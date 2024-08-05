<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','order_code','status'];

    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function orderLists(){
        return $this->hasMany(CustomerOrder::class);
    }
}
