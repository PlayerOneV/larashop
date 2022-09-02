<x-layout>
    <x-slot:title>
        Edit Product
        </x-slot>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    
    <h1>Edit product</h1>

    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row mb-3">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') ?? $product->title }}"
                required>
        </div>
        <div class="form-row mb-3">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description"
                value="{{ old('description') ?? $product->description }}" required>
        </div>
        <div class="form-row mb-3">
            <label for="price">Price</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price"
                value="{{ old('price') ?? $product->price }}" required>
        </div>
        <div class="form-row mb-3">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" min="0" name="stock"
                value="{{ old('stock') ?? $product->stock }}" required>
        </div>
        <div class="form-row mb-3">
            <label for="status">Status</label>
            <select class="custom-select" name="status" required>
                <option {{ old('status') ? 'selected' : ($product->status ? 'selected' : '') }} value="1">
                    Available
                </option>
                <option {{ !old('status') ? 'selected' : (!$product->status ? 'selected' : '') }} value="0">
                    Unavailable
                </option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
        </div>
    </form>
</x-layout>
