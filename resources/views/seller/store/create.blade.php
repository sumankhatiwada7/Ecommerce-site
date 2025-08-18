@extends('seller.layout.layout')

@section('seller-page-title')
Create Store - Seller Panel
@endsection

@section('seller_layout')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Create Store Page') }}
</h2>
<div class="card ">
    <div class="card-header">
        <h5 class="card-title mb-0">Create Store</h5>
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
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <form action="{{ route('seller.store.publish') }}" method="POST">
            @csrf
            <label for="store_name" class="fw-bold mb-3">Give Store Name</label>
            <input type="text" class="form-control mb-3" name="store_name" placeholder="Input">
           
            <label for="store_description" class="fw-bold mb-3">Give Store Description</label>
            <textarea class="form-control mb-3" name="store_description" placeholder="Input"></textarea>
            <label for="slug" class="fw-bold mb-3">Store Slug</label>
            <input type="text" class="form-control mb-3" name="slug" placeholder="Input">
            <button class="btn btn-primary">Create Store</button>
        </form>
    </div>
</div>
@endsection
