<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>{{ $data['body'] }}</p>
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
                @isset($data['cart'])
                @forelse($data['cart'] as $cartItem)
                <tr id="{{ $cartItem['id'] }}">
                    <td class="cart_product">
                        @if(isset($cartItem['firstAvatar']))
                        <img src="{{ asset('admin/user/upload/' . $cartItem['firstAvatar']) }}" alt="{{ $cartItem['name'] }}" style="width:100px; height:80px; margin-left:5px">
                        @else
                        <span>No Image</span>
                        @endif
                    </td>
                    <td class="cart_description">
                        <h4><a href=""></a></h4>
                        <p>{{ $cartItem['name'] }}</p>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""></a></h4>
                        <p>{{ $cartItem['detail'] }}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{ $cartItem['price'] }}$</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="#"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cartItem['quantity'] }}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="#"> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">{{ $cartItem['quantity'] * $cartItem['price'] }}$</p>
                    </td>
                    <td class="cart_delete" style="margin-top: 15px;">
                        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; color:red">
                        <h2><?php echo "Không có sản phẩm nào."; ?></h2>
                    </td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <!-- <tr>
                                <td>Cart Sub Total</td>
                                <td>$59</td>
                            </tr> -->
                            <!-- <tr>
                                <td>Exo Tax</td>
                                <td>$2</td>
                            </tr> -->
                            <tr class="shipping-cost">
                                <td>Shipping Cost</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>
                                    <span id="totalBill">
                                        <?php
                                        $cartTotal = 0;
                                        foreach ($data['cart'] as $cartItem) {
                                            $cartTotal += $cartItem['quantity'] * $cartItem['price'];
                                        }
                                        echo $cartTotal ."$";
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endisset
            </tbody>
        </table>
    </div>
</body>

</html>