<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'phone',
        'address',
        'image',
        'trans_id',
    ];

    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
