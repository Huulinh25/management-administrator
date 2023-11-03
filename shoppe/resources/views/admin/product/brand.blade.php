@extends('admin.master.master')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Brand</h4>
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
                        <th scope="col">Brand</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($brands->count() > 0) {
                        foreach ($brands as $brand) {
                    ?>
                            <tr>
                                <th scope="row"></th>
                                <th><?php echo $brand->brand_name ?></th>

                                </th>
                                <th>
                                    <a href="" class="btn btn-primary text-white mr-2">Edit</a>
                                    <a href="{{ route('brand.deleteBrand', ['id' => $brand->id]) }}" class="btn btn-danger text-white mr-2">Delete</a>
                                </th>
                            </tr>
                            <?php
                        } //end foreach
                    } // end if
                    ?>
                </tbody>
            </table>
            {{ $brands->links() }}
            <a href="{{route('brand.addBrand')}}" class="btn btn-success text-white ml-2 mb-2">Create Brand</a>

        </div>
    </div>
</div>
@endsection