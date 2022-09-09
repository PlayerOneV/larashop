<x-layout>
    <x-slot:title>
        Products
        </x-slot>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <h1>Order details</h1>
        <h4 class="text-center"><strong>Grand Total: </strong> $ {{$cart->total}}</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset($product->images->first()->path) }}" alt="" width="100px">
                                {{ $product->title }}
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>
                                <strong>
                                    {{ $product->total }}
                                </strong>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</x-layout>
