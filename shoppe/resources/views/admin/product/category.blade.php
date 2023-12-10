@extends('admin.master.master')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Category</h4>
        </div>
        <div class="table-responsive">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @php $startFrom = ($categories->currentPage() - 1) * $categories->perPage() + 1 @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $startFrom++ }}</th>
                        <th>{{ $category->category_name }}</th>
                        <th>
                            <a href="{{ route('category.getEditCategory',['id' => $category->id]) }}" class="btn btn-primary text-white mr-2">Edit</a>
                            <a href="{{ route('category.deleteCategory', ['id' => $category->id]) }}" class="btn btn-danger text-white mr-2">Delete</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('category.addCategory') }}" class="btn btn-success text-white ml-2 mb-2">Create Product</a>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
