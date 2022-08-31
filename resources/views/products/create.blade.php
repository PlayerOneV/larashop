<x-layout>
    <h1>New product</h1>

    <form method="POST" action="{{route('products.store')}}">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" required>
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" required>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="price" required>
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input class="form-control" type="number" min="0" name="stock" required>
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select class="custom-select" name="status" id="" required>
                <option value="" selected>Select...</option>
                <option value="1">Available</option>
                <option value="0">Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>
    </form>
</x-layout>