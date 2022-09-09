<x-layout>
    <x-slot:title>
        Cart
    </x-slot:title>
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            Your cart is empty!
        </div>
    @else
        <h4 class="text-center">Your cart total <strong>{{ $cart->total }}</strong></h4>
        <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Start Order</a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    <x-product-card :product="$product" :cart="$cartId"></x-product-card>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
