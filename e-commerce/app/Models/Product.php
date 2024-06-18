<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'category',
        'price',
        'stock',
        'description',
    ];

    public function cartItems(){
        return $this -> hasMany(CartItem::class);
    }
}