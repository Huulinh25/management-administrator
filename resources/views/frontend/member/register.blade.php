@extends('frontend.layouts.app')
@section('content')
<div class="signup-form"><!--sign up form-->
    <h2>Đăng Ký!</h2>
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
    <form action="{{ route('member.postRegister') }}" enctype="multipart/form-data" method="post">
        @csrf
        <label class="col-md-12">Avatar</label>
        <input type="file" name="avatar" />
        <label class="col-md-12">Name</label>

        <input type="text" placeholder="Name" name="name" />
        <label class="col-md-12">Email</label>
        <input type="email" placeholder="Email Address" name="email" />
        <label class="col-md-12">Pass</label>
        <input type="password" placeholder="Password" name="password" />
        <input type="text" value="" name="phone" placeholder="123 456 7890" class="form-control form-control-line">

        <label>Select Country</label>
        <div>
            <select name="id_country" class="form-control form-control-line">
                <?php
                if ($countries->count() > 0) {
                    foreach ($countries as $country) {
                ?>
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                <?php
                    } //end foreach
                } // end if
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Signup</button>
        <br />
    </form>
</div><!--/sign up form-->
@endsection