@extends('admin.layout.layout')

@section('admin-page-title')
Manage Categories - Admin Panel
@endsection

@section('admin_layout')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' Manage categories') }}
    </h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                         <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection