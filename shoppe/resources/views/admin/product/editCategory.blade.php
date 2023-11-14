@extends('admin.master.master')
@section('content') 
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <div class="mb-2">
                <a href="{{ url()->previous() }}" class="btn btn-primary">< Quay lại</a> <!-- Thêm nút "Quay lại" -->
            </div>
            <h4 class="card-title">Create Category</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal m-t-30" action="{{ route('category.postEditCategory', ['id' => $category->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="example-email">Category <span class="text-danger">(*)</span></label>
                    <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control" placeholder="Name category...">
                </div>
                <button type="submit" class="btn btn-success text-white">Update Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
