@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1>Create Product</h1>
                </div>
                <div class="card-body">
                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Product ID:</label>
                            <input type="text" id="product_id" name="product_id" value="{{ old('product_id') }}" class="form-control" required>
                            <div class="invalid-feedback">
                                Please provide a id.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
                            <div class="invalid-feedback">
                                Please provide a name.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" class="form-control" required>
                            <div class="invalid-feedback">
                                Please provide a price.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('products.index') }}" class="btn btn-success">Back to Product List</a>
                        
                            <button type="submit" class="btn btn-primary">Product Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection