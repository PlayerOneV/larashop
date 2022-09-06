<?php

namespace App\View\Components;

use Illuminate\View\Component;

class productCard extends Component
{
    public $product;
    public $cart;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $cart = null)
    {
        $this->product = $product;
        $this->cart = $cart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
