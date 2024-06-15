<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'transaction_date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany(TransactionDetails::class);
    }
}
