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

    // Dari merge login
    // protected $fillable = [
    //     'name', 
    //     'description', 
    //     'price',
    //     'stock', 
    //     'image_url', 
    //     'category_id'
    // ];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}