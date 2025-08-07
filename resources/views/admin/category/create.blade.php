@extends('admin.layout.layout')

@section('admin-page-title')
Create category - Admin Panel
@endsection

@section('admin_layout')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Create Category Page') }}
</h2>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Create Category</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.maincategory.create') }}" method="POST">
            @csrf
            <label for="category_name" class="fw-bold mb-3">Give Category Name</label>
            <input type="text" class="form-control mb-3" name="category_name" placeholder="Input">
            <button class="btn btn-primary">Create Category</button>
        </form>
    </div>
</div>
@endsection
