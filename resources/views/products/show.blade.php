@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Product Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Product ID:</strong>
                        <p>{{ $product->product_id }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Name:</strong>
                        <p>{{ $product->name }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Description:</strong>
                        <p>{{ $product->description ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Price:</strong>
                        <p>{{ number_format($product->price, 2) }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Stock:</strong>
                        <p>{{ $product->stock ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Image:</strong>
                        @if ($product->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="150">
                            </div>
                        @else
                            <p>No image available.</p>
                        @endif
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-success">Back to Product List</a>
                </div>
            </div>
        </div>
    </div>
@endsection