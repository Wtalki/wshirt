<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'color','color_code'];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
