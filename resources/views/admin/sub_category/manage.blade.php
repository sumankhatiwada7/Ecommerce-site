@extends('admin.layout.layout')

@section('admin-page-title')
Create Subcategory - Admin Panel
@endsection

@section('admin_layout')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' Manage subcategory page') }}
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
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->subcategory }}</td>
                    <td>{{ $subcategory->category->category_name }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.mainsubcategory.edit', $subcategory->id) }}" class="btn btn-primary">Edit</a>
                        <!-- Delete Button -->
                        <form action="{{ route('admin.mainsubcategory.delete', $subcategory->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection