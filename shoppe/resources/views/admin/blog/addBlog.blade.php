@extends('admin.master.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h4 class="card-title">Create Blog</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal m-t-30" action="{{route('blog.postBlog')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="example-email">Title <span class="text-danger">(*)</span></label>
                    <input type="text" value="" name="title" class="form-control" placeholder="Title...">
                </div>
                <div class="form-group">
                    <label for="example-email">Image </label>
                    <input type="file" value="" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="example-email">Description </label>
                    <input type="text" value="" name="description" class="form-control" placeholder="Description about your blog...">
                </div>
                <div class="form-group col-md-12">
                    <label>Content</label> 
                    <br />
                    <textarea name="txtContent" name="content" class="form-control" id="editor1"></textarea>
                </div>

                <button type="submit" class="btn btn-success text-white">Add Blog</button>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- @push('scripts')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endpush -->