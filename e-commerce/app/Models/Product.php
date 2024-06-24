<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category', 
        'description', 
        'price',
        'stock', 
        'image_url', 
        'category_id'
    ];

    public function cartItems(){
        return $this -> hasMany(CartItem::class);
    }
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}