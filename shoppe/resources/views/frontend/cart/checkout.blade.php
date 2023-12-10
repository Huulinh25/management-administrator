@extends('frontend.layouts.app')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>
        <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->
        @if(Auth::check()==false)
        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->
        <div class="signup-form"><!--sign up form-->
            <h2>Register!</h2>
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
            <form action="{{ url('/member-register') }}" enctype="multipart/form-data" method="post">
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
        @endif
        <div class="table-responsive cart_info">
            <tr>
                <td>Email:</td>
                <td>
                    @auth
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required>
                    @else
                    <input type="email" name="email" required>
                    @endauth
                </td>
            </tr>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td>Detail</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if($cart)
                    @foreach($cart as $cartItem)
                    <tr id="{{$cartItem['id']}}">
                        <td class="cart_product">
                            <img src="{{ asset('admin/user/upload/' . $cartItem['firstAvatar']) }}" alt="{{ $cartItem['name'] }}" style="width:100px; height:80px; margin-left:5px">
                        </td>
                        <td class="cart_description">
                            <h4><a href=""></a></h4>
                            <p>{{$cartItem['name']}}</p>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""></a></h4>
                            <p>{{$cartItem['detail']}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$cartItem['price']}}$</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="#"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cartItem['quantity']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="#"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$cartItem['quantity'] * $cartItem['price']}}$</p>
                        </td>
                        <td class="cart_delete" style="margin-top: 15px;">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7" style="text-align: center; color:red">
                            <h2><?php echo "Không có sản phẩm nào."; ?></h2>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>$59</td>
                                </tr>
                                <tr>
                                    <td>Exo Tax</td>
                                    <td>$2</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span id="totalBill">$61</span></td>
                                </tr>
                            </table>

                            <a href="{{ Auth::check() ? url('/test') : '#' }}" id="orderBtn" class="btn btn-primary">Order</a>

                            @if(!Auth::check())
                            <script>
                                document.getElementById('orderBtn').addEventListener('click', function() {
                                    alert('Please login before ordering');
                                });
                            </script>
                            @endif

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if (session('success'))
    <script>
        // Use JavaScript to show an alert after the page is loaded
        window.onload = function() {
            alert("{{ session('success') }}");
        };
    </script>
    @endif
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function updateTotalBill() {
                var totalBill = 0;
                $(".cart_total_price").each(function() {
                    var totalPrice = parseInt($(this).text());
                    totalBill += totalPrice;
                });

                $("#totalBill").text("$" + totalBill);
            }
            $(".cart_quantity_up").click(function() {
                var row = $(this).closest("tr");
                var price = parseInt(row.find(".cart_price").text());
                var qtyInput = row.find(".cart_quantity_input");
                var currentQty = parseInt(qtyInput.val());
                currentQty++;
                // Cập nhật giá trị số lượng và tổng giá trị sản phẩm
                qtyInput.val(currentQty); //qty 
                // console.log(currentQty);
                var totalPrice = price * currentQty;
                row.find(".cart_total_price").text(totalPrice + "$");
                updateTotalBill();

                // Gửi AJAX để cập nhật qty trong session
                var getId_Product = row.attr("id");
                // alert(getId_Product);
                $.ajax({
                    method: "POST",
                    url: "{{ url('member/account/update-cart') }}",
                    data: {
                        productId: getId_Product,
                        newQty: currentQty
                    },
                    success: function(response) {
                        console.log(response);
                        console.log("Product updated successfully");
                        $(".cartTotal").text(response.cartTotal);
                    }
                });
            });
            $(".cart_quantity_down").click(function() {
                var row = $(this).closest("tr");
                var price = parseInt(row.find(".cart_price").text());
                var qtyInput = row.find(".cart_quantity_input");
                var currentQty = parseInt(qtyInput.val());
                // console.log(currentQty);
                if (currentQty > 1) {
                    currentQty--;
                    // Cập nhật giá trị số lượng và tổng giá trị sản phẩm
                    qtyInput.val(currentQty); //qty 
                    var totalPrice = price * currentQty;
                    row.find(".cart_total_price").text(totalPrice + "$");
                    updateTotalBill();

                    var getId_Product = row.attr("id");
                    // alert(getId_Product);
                    $.ajax({
                        method: "POST",
                        url: "{{ url('member/account/update-cart') }}",
                        data: {
                            productId: getId_Product,
                            newQty: currentQty
                        },
                        success: function(response) {
                            console.log(response);
                            console.log("Product updated successfully");
                            $(".cartTotal").text(response.cartTotal);
                        }
                    });
                }
            });
            $(".cart_quantity_delete").click(function() {
                var row = $(this).closest("tr"); // Lấy dòng <tr> cha của nút xóa
                var productId = row.attr("id"); // Lấy id của dòng

                $.ajax({
                    method: "POST",
                    url: "{{ url('member/account/delete-cart') }}",
                    data: {
                        productId: productId // Truyền id sản phẩm cần xóa
                    },
                    success: function(response) {
                        // console.log(response);
                        // Sau khi xóa thành công, có thể cập nhật giao diện người dùng tại đây
                        // Ví dụ: Xóa dòng sản phẩm khỏi bảng giỏ hàng
                        row.remove();
                        // window.location.reload();	
                    }
                });
            });
            updateTotalBill();
        })
    </script>
</section>
@endsection