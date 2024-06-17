<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // 'transaction_id',
        'transaction_date',
        'ship_fee',
        'total_price',
    ];

    protected $table = 'purchase_history';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction()
    {
        return $this->hasMany(TransactionDetails::class);
    }
}
