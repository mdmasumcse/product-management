@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">All Products List</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Search Form with Input Group -->
            <form method="GET" action="{{ route('products.index') }}" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by ID or Description">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <!-- Create Product Button -->
            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>

        <!-- Products Table -->
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>
                                <a href="{{ route('products.index', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                    Name
                                    @if(request('sort') === 'name')
                                        <span>{{ request('direction') === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </a>
                            </th>
                            <th>Description</th>
                            <th>
                                <a href="{{ route('products.index', ['sort' => 'price', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                    Price
                                    @if(request('sort') === 'price')
                                        <span>{{ request('direction') === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </a>
                            </th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description ?? 'N/A' }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock ?? 'N/A' }}</td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail" style="width: 50px; height: 50px;">
                                    @else
                                        <p>No image available.</p>
                                    @endif
                                </td>
                                
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $products->appends(['sort' => request('sort'), 'direction' => request('direction')])->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
