@extends('admin.layout.layout')

@section('admin-page-title')
Edit category - Admin Panel
@endsection

@section('admin_layout')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Edit Category Page') }}
</h2>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Edit Category</h5>
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
        <form action="{{ route('admin.productattribute.update', $attribute->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="attribute_value" class="fw-bold mb-3">Give Attribute Value</label>
            <input type="text" class="form-control mb-3" name="attribute_value" value="{{ $attribute->attribute_value }}" placeholder="Input">
            <button class="btn btn-primary">Update Attribute</button>
        </form>
    </div>
</div>
@endsection
