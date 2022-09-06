<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;

class CartService
{
    protected $cookieNane = 'cart';

    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieNane);

        $cart = Cart::find($cartId);
         
        return $cart;
    }

    public function getFromCookieOrCreate()
    {
        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();
    }

    public function makeCookie($cart)
    {
        return Cookie::make($this->cookieNane, $cart->id, 7 * 24 * 60);
    }

    public function countProducts()
    {
        $cart = $this->getFromCookie();

        if ($cart != null) {
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }
}
