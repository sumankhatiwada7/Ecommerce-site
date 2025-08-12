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
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('admin.maincategory.edit', $category_info->id) }}" method="POST">
            @csrf
            <label for="category_name" class="fw-bold mb-3">Give Category Name</label>
            <input type="text" class="form-control mb-3" name="category_name" value="{{ $category_info->category_name }}" placeholder="Input">
            <button class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>
@endsection
