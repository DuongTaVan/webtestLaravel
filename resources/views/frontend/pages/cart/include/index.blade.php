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
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img height="110px" width="110px" src="{{$cart->options->image}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cart->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$cart->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input quantity_number" data-rowid="{{$cart->rowId}}"
                                       onchange="update('{{ $cart->rowId }}',this.value)" type="number"
                                       value="{{$cart->qty}}" min="0">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                ${{ number_format($cart->price * $cart->qty,0,',','.') }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete delete_product" onclick="myFunction('{{$cart->rowId}}')"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate
                your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox" id="check_coupon" onchange="coupon()">
                            <label>Use Coupon Code</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select class="js_location" onchange="city()">
                                <option>----Thành phố----</option>
                                @foreach($cities as $city)
                                <option value="{{$city->code}}">{{$city->name}}</option>
                                @endforeach
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select class="district">

                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input class="inputDisabled code" type="text" disabled name="code">
                        </li>
                    </ul>
                    <a class="btn btn-default check_out" onclick="abcd()">Continue</a>
                    <a class="btn btn-default check_out" onclick="destroy()">Delete Coupon</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>${{ \Cart::subtotal(0)}}</span></li>
                        <li>Eco Tax <span>$0</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        @if(Session::get('coupon'))
                            <li>Coupon Code <span>

                                @foreach(Session::get('coupon') as $coupon)
                                        <span>{{$coupon['cp_name']}}</span>
                                    @endforeach

                            </span></li>
                            <li>Number Code <span>
                                    @foreach(Session::get('coupon') as $coupon)
                                        @if($coupon['cp_type'] == 0)
                                            <span>{{$coupon['cp_number']}} %</span>
                                        @else
                                            <span>${{number_format($coupon['cp_number'])}}</span>
                                        @endif
                                    @endforeach
                                </span></li>
                            <li>Total <span>
                                    @foreach(Session::get('coupon') as $coupon)
                                        @php
                                            //$total = \Cart::subtotal(0);
                                            $var =str_replace( ',', '', Cart::subtotal(0) );

                                        @endphp
                                        @if($coupon['cp_type'] == 0)
                                            <span>${{number_format($var-$var*$coupon['cp_number']/100)}}</span>
                                        @else
                                            <span>${{number_format($var-$coupon['cp_number'])}}</span>
                                        @endif
                                    @endforeach
                                    </span></li>

                        @endif
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
                <div id="paypal-button"></div>
            </div>
        </div>
    </div>
</section>

