<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedLoginAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'attempt_count',
        'last_attempt_at',
    ];

    protected $dates = [
        'last_attempt_at',
    ];
}
