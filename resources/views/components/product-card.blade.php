<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" alt="" height="400px">
    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->price }}</strong></h4>
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"><strong>{{ $product->stock }} left</strong></p>
        @isset($cart)
            <form action="{{ route('products.carts.destroy', ['product' => $product->id, 'cart' => $cart]) }}"
                method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Remove from car</button>
            </form>
        @else
            <form action="{{ route('products.carts.store', ['product' => $product->id]) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">Add to car</button>
            </form>
        @endisset
    </div>
</div>
