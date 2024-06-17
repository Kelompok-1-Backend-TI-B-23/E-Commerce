<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_history_id',
        'quantity',
    ];

    protected $table = 'transaction_details';

    public function transaction(){
        return $this->belongsTo(PurchaseHistory::class);
    }

    // public function product(){
    //     return $this->belongsTo(Product::class);
    // }
    public function product()
    {
        return $this->belongsToMany(Product::class, 'transaction_details');
                    // ->withPivot('quantity')
                    // ->withTimestamps();
    }
}
