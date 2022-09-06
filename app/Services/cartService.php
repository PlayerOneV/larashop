<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;

class CartService
{
    protected $cookieNane = 'cart';
    public function getFromCookieOrCreate()
    {
        $cartId = Cookie::get($this->cookieNane);

        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();
    }

    public function makeCookie($cart)
    {
        return Cookie::make($this->cookieNane, $cart->id, 7 * 24 * 60);
    }
}
