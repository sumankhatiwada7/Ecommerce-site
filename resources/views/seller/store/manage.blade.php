@extends('seller.layout.layout')

@section('seller-page-title')
Manage stores - Seller Panel
@endsection

@section('seller_layout')
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __(' Manage stores') }}
</h2>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manage stores</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Store_Name</th>
                    <th>slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stores as $store)
                <tr>
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->store_name }}</td>
                    <td>{{ $store->slug }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('seller.store.edit', $store->id) }}" class="btn btn-primary">Edit</a>
                        <!-- Delete Button -->
                        <form action="{{ route('seller.store.delete', $store->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
