@extends('admin.layout.layout')

@section('admin-page-title')
Create Subcategory - Admin Panel
@endsection

@section('admin_layout')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __(' Create subcategory page') }}
</h2>
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Create Category</h5>
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
        <form action="{{ route('admin.mainsubcategory.store') }}" method="POST">
            @csrf
            
            <label for="subcategory" class="fw-bold mb-3">Give subCategory Name</label>
            <input type="text" class="form-control mb-3" name="subcategory" placeholder="Input">
            <label for="category_name" class="fw-bold mb-3">select Category Name</label>
            <select name="category_id" class="form-control mb-3">
                @foreach ($Category as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endforeach
            </select>

            <button class="btn btn-primary">Create Subcategory</button>
        </form>
    </div>
</div>
@endsection
