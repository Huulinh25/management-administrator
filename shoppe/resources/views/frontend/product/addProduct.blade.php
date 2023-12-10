@extends('frontend.layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Account</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-products-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ url('/member-profile') }}">Account +</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ url('/account/my-product') }}">My product +</a></h4>
                            </div>
                        </div>
                    </div><!--/category-products-->
                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Create Product</h2>
                    <div class="signup-form"><!--sign up form-->
                        <h2>CREATE PRODUCT</h2>
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
                        <form action="{{ url('/account/add-product') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <input name="name" type="text" placeholder="Name" value="" />
                            <input name="price" type="number" placeholder="Price" value="" />

                            <select name="id_category" class="form-control form-control-line">
                                <option value="">Please choose category</option>

                                <?php
                                if ($categories->count() > 0) {
                                    foreach ($categories as $category) {
                                ?>
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                <?php
                                    } //end foreach
                                } // end if
                                ?>
                            </select>
                       
                            <select name="id_brand" class="form-control form-control-line">
                                <option value="">Please choose brand</option>
                                <?php
                                    if ($brands->count() > 0) {
                                        foreach ($brands as $brand) {
                                ?>
                                        <option value="{{ $brand->id }}" {{ $brand->id == Auth::user()->id_brand ? 'selected' : '' }}>{{ $brand->brand_name }}</option>

                                <?php
                                    } //end foreach
                                } // end if
                                ?>
                            </select>
                            <select name="status" id="status" class="form-control form-control-line">
                                <option value="1">Sale</option>
                                <option value="0">New</option>
                            </select>

                            <div class="input-group upLine">
                                <input name="sale" type="text" value="0" class="form-control" />
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <input name="company" type="text" placeholder="Company profile" value="" />
                            <input type="file" name="avatar[]" multiple />

                            <textarea name="detail" id="" placeholder="Detail"></textarea>

                            <button type="submit" class="btn btn-default" style="margin-bottom: 20px;">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .upLine {
        display: flex;
        margin-bottom: 10px;
        align-items: center;
        width: 200px;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusSelect = document.getElementById("status");
        var saleInput = document.querySelector(".upLine");

        statusSelect.addEventListener("change", function() {
            if (statusSelect.value == "1") {
                saleInput.style.display = "flex";
            } else {
                saleInput.style.display = "none";
            }
        });

        // Khi trang được tải, kiểm tra giá trị ban đầu của lựa chọn
        if (statusSelect.value == "1") {
            saleInput.style.display = "flex";
        } else {
            saleInput.style.display = "none";
        }
    });
</script>
@endsection