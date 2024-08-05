<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerReview extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','product_id','rating','text'];

    function products(){
        return $this->belongsTo(Product::class);
    }
}
