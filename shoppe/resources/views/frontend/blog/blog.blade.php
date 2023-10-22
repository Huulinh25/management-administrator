@extends('frontend.layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Blog</h4>
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
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($blogs->count() > 0) {
                        foreach ($blogs as $blog) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $blog->id ?></th>
                                <th><?php echo $blog->title ?></th>
                                <th>
                                    @if (!empty($blog->image))
                                    <img src="{{ asset('admin/user/upload/' . $blog->image) }}" width="100" height="100">
                                    @else
                                    <?php echo $blog->image ?>
                                    @endif
                                </th>
                                <th><?php echo $blog->description ?></th>
                                <th>
                                    <a href="{{route('member.detailBlog', $blog->id)}}" class="btn btn-success text-white mr-2">View detail</a>
                                </th>
                            </tr>
                    <?php
                        } //end foreach
                    } // end if
                    ?>
                </tbody>
            </table>

        </div>
        {{ $blogs->links() }}
    </div>
</div>
@endsection