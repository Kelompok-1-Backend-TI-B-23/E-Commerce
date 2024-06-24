<?php

namespace App\Models;
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
    ];

    public function transaction()
    {
        return $this->belongsToMany(PurchaseHistory::class, 'transaction_details')->withPivot('quantity');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}