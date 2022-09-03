<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    @empty($products)
        <div class="alert alert-warning">
            There is not products yet!
        </div>
    @endempty
    <div class="row">
        @foreach ($products as $product)
            <div class="col-3">
                <x-product-card :product="$product"></x-product-card>
            </div>
        @endforeach
    </div>
</x-layout>
