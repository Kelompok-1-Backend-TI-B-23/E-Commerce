<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = 
    ['user_id', 
    'total_price', 
    'shipping_cost',
    'status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
