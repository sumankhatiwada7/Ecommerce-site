@extends('seller.layout.layout')

@section('seller-page-title')
Add Product - Seller Panel
@endsection

@section('seller_layout')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add New Product') }}
    </h2>
    <livewire:categroyandsubcategroy />

@endsection