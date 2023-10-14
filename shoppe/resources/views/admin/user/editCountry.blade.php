@extends('admin.master.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h4 class="card-title">Edit Country</h4>
            <form class="form-horizontal m-t-30" action="{{ route('country.postEditCountry', ['id' => $country->id]) }}" method="post">
                @csrf 
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="form-group">
                    <label>Title <span class="text-danger">(*)</span></label>
                    <input type="text" name="name" value="{{ $country->name }}" class="form-control" placeholder="Title...">
                </div>
                <button type="submit" class="btn btn-success text-white">Update Country</button>
            </form>
        </div>
    </div>
</div>
@endsection