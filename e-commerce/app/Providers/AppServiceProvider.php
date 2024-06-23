<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer(['*'], function ($view) {
            // Check if the current view is not login or createAccount
            if (!in_array($view->getName(), ['login', 'createAccount'])) {
                // Fetch the cart for the authenticated user (if any)
                if (auth()->check()) {
                    $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();
                } else {
                    $cart = null;
                }

                // Share $cart variable with the view
                $view->with('cart', $cart);
            }
        });
    }
}
