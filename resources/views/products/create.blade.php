<x-layout>
    <x-slot:title>
        Create Product
        </x-slot>
        <h1>New product</h1>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-row mb-3">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-row mb-3">
                <label for="description">Description</label>
                <input class="form-control" type="text" name="description" value="{{ old('description') }}" required>
            </div>
            <div class="form-row mb-3">
                <label for="price">Price</label>
                <input class="form-control" type="number" min="1.00" step="0.01" name="price"
                    value="{{ old('price') }}" required>
            </div>
            <div class="form-row mb-3">
                <label for="stock">Stock</label>
                <input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') }}"
                    required>
            </div>
            <div class="form-row mb-3">
                <label for="status">Status</label>
                <select class="custom-select" name="status" id="" required>
                    <option value="" selected>Select...</option>
                    <option {{ old('status') ? 'selected' : '' }} value="1">Available</option>
                    <option {{ !old('status') ? '' : 'selected' }} value="0">Unavailable</option>
                </select>
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-success btn-lg">Create Product</button>
            </div>
        </form>
</x-layout>
