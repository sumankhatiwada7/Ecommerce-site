@extends('seller.layout.layout')

@section('seller-page-title')
edit Product - Seller Panel
@endsection

@section('seller_layout')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Edit Product Page') }}
</h2>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Edit product details</h5>
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
        <form action="{{ route('seller.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="product_name" class="fw-bold mb-3">Product Name</label>
            <input type="text" class="form-control mb-3" name="product_name" value="{{ $product->product_name }}" placeholder="Input">

            <label for="description" class="fw-bold mb-3">Product Description</label>
            <textarea class="form-control mb-3" name="description" placeholder="Input">{{ $product->description }}</textarea>

            <label for="sku" class="fw-bold mb-3">SKU</label>
            <input type="text" class="form-control mb-3" name="sku" value="{{ $product->sku }}" placeholder="Input">

         

            <label for="regular_price" class="fw-bold mb-3">Regular Price</label>
            <input type="number" class="form-control mb-3" name="regular_price" value="{{ $product->regular_price }}" step="0.01" placeholder="Input">

            <label for="discount_price" class="fw-bold mb-3">Discount Price</label>
            <input type="number" class="form-control mb-3" name="discount_price" value="{{ $product->discount_price }}" step="0.01" placeholder="Input">

            <label for="tax_price" class="fw-bold mb-3">Tax Price</label>
            <input type="number" class="form-control mb-3" name="tax_price" value="{{ $product->tax_price }}" step="0.01" placeholder="Input">

            <label for="stock_quantity" class="fw-bold mb-3">Stock Quantity</label>
            <input type="number" class="form-control mb-3" name="stock_quantity" value="{{ $product->stock_quantity }}" placeholder="Input">

            <label for="stock_status" class="fw-bold mb-3">Stock Status</label>
            <select class="form-select mb-3" name="stock_status">
                <option value="instock" @if($product->stock_status == 'instock') selected @endif>In Stock</option>
                <option value="outofstock" @if($product->stock_status == 'outofstock') selected @endif>Out of Stock</option>
            </select>

            <label for="slug" class="fw-bold mb-3">Slug</label>
            <input type="text" class="form-control mb-3" name="slug" value="{{ $product->slug }}" placeholder="Input">

            

            <label for="meta_title" class="fw-bold mb-3">Meta Title</label>
            <input type="text" class="form-control mb-3" name="meta_title" value="{{ $product->meta_title }}" placeholder="Input">

            <label for="meta_description" class="fw-bold mb-3">Meta Description</label>
            <textarea class="form-control mb-3" name="meta_description" placeholder="Input">{{ $product->meta_description }}</textarea>



            <label for="images" class="fw-bold mb-3">Product Images</label>
            <input type="file" class="form-control mb-3" name="images[]" multiple>

            <button class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>
@endsection