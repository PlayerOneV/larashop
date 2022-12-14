<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        return view('payments.create', ['order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $this->cartService->getFromCookie()->products()->detach();

        $order->payment()->create([
            'amount' => $order->total,
            'payed_at' => now(),
        ]);

        $order->status = 'payed';
        $order->save();

        return redirect()->route('home')->with("Thank you for you support!");
    }
}
