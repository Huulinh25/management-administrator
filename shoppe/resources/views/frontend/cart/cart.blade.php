@extends('frontend.layouts.app')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
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
							<a class="cart_quantity_delete"><i class="fa fa-times"></i></a>
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
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>$59</span></li>
						<li>Eco Tax <span>$2</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span id="totalBill">$61</span></li>
					</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="{{url('/account/check-out-cart')}}">Check Out</a>
				</div>
			</div>
		</div>
	</div>
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
					url: "{{ url('/account/delete-cart') }}",
					data: {
						productId: productId // Truyền id sản phẩm cần xóa
					},
					success: function(response) {
						// console.log(response);
						// Sau khi xóa thành công, có thể cập nhật giao diện người dùng tại đây
						// Ví dụ: Xóa dòng sản phẩm khỏi bảng giỏ hàng
						row.remove();
						window.location.reload();	
					}
				});
			});
			updateTotalBill();
		})
	</script>
</section><!--/#do_action-->
@endsection