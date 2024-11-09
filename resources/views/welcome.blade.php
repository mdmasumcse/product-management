@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Products Table -->
        <div class="card my-5 text-center">
            <div class="card-body my-5">
                <h2 class="text-center my-5">Wellcome to product management system</h2>

                <a href="{{ route('products.index') }}" class="btn btn-success  mb-5">Open Product Module</a>
            </div>
        </div>

        
    </div>
@endsection