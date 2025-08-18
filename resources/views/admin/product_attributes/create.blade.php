@extends('admin.layout.layout')

@section('admin-page-title')
Create Product Attributes - Admin Panel
@endsection

@section('admin_layout')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' Create product attributes') }}
    </h2>
      <div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0"> Product Attribute</h5>
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
        <form action="{{ route('admin.productattribute.create') }}" method="POST">
            @csrf
            <label for="attribute_value" class="fw-bold mb-3">provide attribute</label>
            <input type="text" class="form-control mb-3" name="attribute_value" placeholder="Input">
            <button class="btn btn-primary">Create attribute</button>
        </form>
    </div>
</div>

@endsection