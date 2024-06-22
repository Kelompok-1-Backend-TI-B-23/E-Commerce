<?php

namespace App\Listeners;

use App\Models\Cart;
use Illuminate\Auth\Events\Registered;

class CreateCartForNewUser
{
    public function handle(Registered $event)
    {
        // Create a new cart for the registered user
        Cart::create([
            'user_id' => $event->user->id,
        ]);
    }
}

