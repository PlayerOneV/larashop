<x-layout>
    <h1>Edit product</h1>

    <form method="POST" action="{{route('products.update', ['product' => $product->id])}}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="{{$product->title}}" required>
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" value="{{$product->description}}" required>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" min="0" name="stock" value="{{$product->stock}}" required>
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select class="custom-select" name="status" required>
                <option {{$product->status ? 'selected' : ''}} value="1">Available</option>
                <option {{!$product->status ? 'selected' : ''}} value="0">Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
        </div>
    </form>
</x-layout>