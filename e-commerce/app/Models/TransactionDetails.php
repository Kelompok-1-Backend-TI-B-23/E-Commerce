<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
    ];

    public function transaction(){
        return $this->belongsTo(PurchaseHistory::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');;
    }
}
