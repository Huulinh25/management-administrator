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
                                <h4 class="panel-title"><a href="{{ url('member/account/update') }}">Account +</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ url('member/account/my-product') }}">My product +</a></h4>
                            </div>
                        </div>
                    </div><!--/category-products-->
                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Update product</h2>
                    <div class="signup-form"><!--sign up form-->
                        <h2>UPDATE PRODUCT</h2>
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
                        <form action="{{ route('member.postEditProduct', ['id' => $selected_product['id']]) }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <input name="name" type="text" placeholder="Name" value="{{ $selected_product['name'] }}" />
                            <input name="price" type="number" placeholder="Price" value="{{ $selected_product['price'] }}" />

                            <select name="id_category" class="form-control form-control-line">
                                @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}" {{ $category->id == $selected_product['id_category'] ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                            <select name="id_brand" class="form-control form-control-line">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $selected_product['id_brand'] ? 'selected' : '' }}>
                                    {{ $brand->brand_name }}
                                </option>
                                @endforeach

                            </select>
                            <select name="status" id="status" class="form-control form-control-line">
                                <option value="1" {{ $selected_product['status'] == 1 ? 'selected' : '' }}>Sale</option>
                                <option value="0" {{ $selected_product['status'] == 0 ? 'selected' : '' }}>New</option>
                            </select>

                            <div class="input-group upLine">
                                <input name="sale" type="text" value="{{ $selected_product['sale']}}" class="form-control" />
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <input name="company" type="text" placeholder="Company profile" value="{{ $selected_product['company']}}" />
                            <input type="file" name="avatar[]" multiple />

                            <ul class="image-list">
                                @foreach (json_decode($list_image_product) as $image)
                                <li>
                                    <img src="{{ asset('member/user/upload/' . $image) }}" alt="{{ $image }}" style="width: 50px;height:50px">
                                    <input type="checkbox" name="selected_images[]" value="{{ $image }}" style="width: 20px;height:20px">
                                </li>
                                @endforeach
                            </ul>   

                            <textarea name="detail" id="" placeholder="Detail">{{ $selected_product['company']}}</textarea>

                            <button type="submit" class="btn btn-default" style="margin-bottom: 20px;">Update product</button>
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
    .image-list {
        display: flex;
        list-style: none;
        padding: 0;
    }

    .image-list li {
        margin-right: 20px;
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