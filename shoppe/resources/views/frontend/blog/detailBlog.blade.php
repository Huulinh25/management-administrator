@extends('frontend.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">ID Blog: {{ $blog->id }}</h5>
                    <br>
                    @if (!empty($blog->image))
                    <img src="{{ asset('admin/user/upload/' . $blog->image) }}" class="img-thumbnail" width="200" height="200">
                    @else
                    {{ $blog->image }}
                    @endif
                    <br>
                    <h3 class="card-title">{{ $blog->title }}</h3>
                    <p class="card-text">{{ $blog->description }}</p>
                    <a class="btn btn-success text-white mr-2"><i class="fas fa-thumbs-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
