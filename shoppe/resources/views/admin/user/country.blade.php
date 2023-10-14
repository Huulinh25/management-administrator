@extends('admin.master.master')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Country</h4>
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
                        <th scope="col">Name</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($countries->count() > 0) {
                        foreach ($countries as $country) {


                    ?>
                            <tr>
                                <th scope="row"><?php echo $country->id ?></th>
                                <th><?php echo $country->name ?></th>
                                <th>
                                    <a href="{{ route('country.getEditCountry', ['id' => $country->id]) }}" class="btn btn-primary text-white mr-2">Edit</a>
                                    <a href="{{ route('country.deleteCountry', ['id' => $country->id]) }}" class="btn btn-danger text-white mr-2">Delete</a>
                                </th>
                            </tr>
                    <?php
                        } //end foreach
                    } // end if
                    ?>
                </tbody>
            </table>
            <a href="{{ route('country.addCountry') }}" class="btn btn-success text-white ml-2 mb-2">Create Country</a>

        </div>
    </div>
</div>
@endsection