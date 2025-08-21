@extends('seller.layout.layout')

@section('seller-page-title')
Manage Products - Seller Panel
@endsection

@section('seller_layout')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Manage Products') }}
    </h2>
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Manage stores</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Slug</th>
                    <th>Store id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{$product->store->id}}</td>

                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('seller.product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <!-- Delete Button -->
                        <form action="{{ route('seller.product.delete', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection