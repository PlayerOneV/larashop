<x-layout>
    <x-slot:title>
        Cart
    </x-slot:title>
    @empty($cart->products)
        <div class="alert alert-warning">
            Your cart is empty!
        </div>
    @endempty
    <div class="row">
        @foreach ($cart->products as $product)
            <div class="col-3">
                <x-product-card :product="$product"></x-product-card>
            </div>
        @endforeach
    </div>
</x-layout>