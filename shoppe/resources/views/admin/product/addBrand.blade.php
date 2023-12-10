@extends('admin.master.master')
@section('content') 
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <div class="mb-2">
                <a href="{{ url('/admin/brand') }}" class="btn btn-primary">< Quay lại</a> <!-- Thêm nút "Quay lại" -->
            </div>
            <h4 class="card-title">Create Brand</h4>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <form class="form-horizontal m-t-30" action="{{route('brand.postBrand')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="example-email">Brand<span class="text-danger">(*)</span></label>
                    <input type="text" value="" name="brand_name" class="form-control" placeholder="Name Brand...">
                </div>
                <button type="submit" class="btn btn-success text-white">Add Brand</button>
            </form>
        </div>
    </div>
</div>
@endsection