@extends('seller.layout.layout')

@section('seller-page-title')
Add Product - Seller Panel
@endsection

@section('seller_layout')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Add New Product') }}
</h2>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Create Category Page') }}
</h2>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Create product</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('seller.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="product_name" class="fw-bold mb-3">Give product Name</label>
            <input type="text" class="form-control mb-3" name="product_name" placeholder="Input">

            <label for="description" class="fw-bold mb-3">Give product Description</label>
            <textarea class="form-control mb-3" name="description" placeholder="Input"></textarea>
            <label for="images" class="fw-bold mb-3">Product Images</label>
            <input type="file" class="form-control mb-3" name="images[]" multiple>


            <label for="sku" class="fw-bold mb-3">SKU</label>
            <input type="text" class="form-control mb-3" name="sku" placeholder="Input">

            <livewire:categroyandsubcategroy />

            <label for="store_id">Store</label>
            <select id="store_id" class="form-select mb-2" name="store_id">
                <option value="">Select Store for your product</option>
                @foreach($stores as $store)
                <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                @endforeach
            </select>

            <label for="regular_price" class="fw-bold mb-3">Regular Price</label>
            <input type="number" class="form-control mb-3" name="regular_price" step="0.01" placeholder="Input">

            <label for="discount_price" class="fw-bold mb-3">Discount Price</label>
            <input type="number" class="form-control mb-3" name="discount_price" step="0.01" placeholder="Input">

            <label for="tax_price" class="fw-bold mb-3">Tax Price</label>
            <input type="number" class="form-control mb-3" name="tax_price" step="0.01" placeholder="Input">

            <label for="stock_quantity" class="fw-bold mb-3">Stock Quantity</label>
            <input type="number" class="form-control mb-3" name="stock_quantity" placeholder="Input">

            <label for="stock_status" class="fw-bold mb-3">Stock Status</label>
            <select class="form-select mb-3" name="stock_status">
                <option value="instock">In Stock</option>
                <option value="outofstock">Out of Stock</option>
            </select>

            <label for="slug" class="fw-bold mb-3">Slug</label>
            <input type="text" class="form-control mb-3" name="slug" placeholder="Input">



            <label for="meta_title" class="fw-bold mb-3">Meta Title</label>
            <input type="text" class="form-control mb-3" name="meta_title" placeholder="Input">

            <label for="meta_description" class="fw-bold mb-3">Meta Description</label>
            <textarea class="form-control mb-3" name="meta_description" placeholder="Input"></textarea>



            <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
</div>


@endsection
