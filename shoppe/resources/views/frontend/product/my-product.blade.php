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
                <section id="cart_items">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table-condensed small-table" style="width: 70%;">
                                <thead>
                                    <tr class="cart_menu" style="background-color: #FFA500; color: #fff;">
                                        <td class="image">Id</td>
                                        <td class="description" style="width: 150px;">Name</td> <!-- Adjust the width as needed -->
                                        <td class="price">Image</td>
                                        <td class="quantity">Price</td>
                                        <td class="total">Action</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>
                                            <i class="btn far fa-edit"></i> <!-- Edit Icon -->
                                            <i class="btn far fa-trash-alt"></i> <!-- Delete Icon -->
                                        </td>
                                   </tr>
                                </tbody>
                            </table>
                            <a href="{{url('member/account/add-product')}}" class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </section> <!--/#cart_items-->
            </div>
        </div>
    </div>
</section>
<style>
    /* Additional custom CSS to adjust the table size */
    .small-table td {
        padding: 5px;
        font-size: 14px;
    }
</style>
@endsection
