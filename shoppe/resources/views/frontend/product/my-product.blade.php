@extends('frontend.layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Account</h2>
                    <div class="panel-group category-products" id="accordian">

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
                <section id="cart_items">
                    <div class="container">
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
                            <table class="table-condensed small-table" style="width: 70%;">
                                <thead>
                                    <tr class="cart_menu" style="background-color: #FFA500; color: #fff;">
                                        <td class="image">Id</td>
                                        <td class="description" style="width: 150px;">Name</td>
                                        <td class="price">Image</td>
                                        <td class="quantity">Price</td>
                                        <td class="total">Action</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product['id'] }}</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>
                                            @php
                                            $avatarArray = json_decode($product['avatar']);
                                            @endphp
                                            <img src="{{ asset('member/user/upload/' . $avatarArray[0]) }}" width="100" height="100" alt="{{ $product['name'] }}">
                                        </td>
                                        <td>{{ $product['price'] }}$</td>
                                        <td>
                                            <a href="{{ url('/account/edit-product/'.$product['id']) }}"><i class="btn far fa-edit"></i></a>
                                            <a href="{{ url('/account/delete-product/'.$product['id']) }}"><i class="btn far fa-trash-alt text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{url('/account/add-product')}}" class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </section> <!--/#cart_items-->
            </div>
        </div>
    </div>
</section>
<style>
    .small-table td {
        padding: 5px;
        font-size: 14px;
    }
</style>
@endsection