@extends('admin.master.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h4 class="card-title">Create Country</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal m-t-30" action="{{ route('country.postCountry') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="example-email">Title <span class="text-danger">(*)</span></label>
                    <input type="text" value="" name="name" class="form-control" placeholder="Title...">
                </div>
                <button type="submit" class="btn btn-success text-white">Add Country</button>
            </form>
        </div>
    </div>
</div>
@endsection