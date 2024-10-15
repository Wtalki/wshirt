<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'sku_number',
        'stock',
        'gender',
        'price',
        'status',
        'template',
        'description',
        'type',
        'cover',
        'view_count',

    ];

    public function images(){
        return $this->hasMany(Image::class);
    }
    public function discounts(){
        return $this->hasMany(Discount::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    public function colors(){
        return $this->hasMany(Color::class);
    }
    public function reviews(){
        return $this->hasMany(CustomerReview::class);
    }
    public function tags(){
        return $this->hasMany(Tag::class);
    }
    public function averageRating(){
        return $this->reviews()->latest()->take(5)->avg('rating');
    }

}
