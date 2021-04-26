@extends('welcome')
@section('content')

<section id="cart_items">
    <center>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {!! session()->get('message') !!}
    </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {!! session()->get('error') !!}
        </div>
    @endif
    </center>
    <div class="row">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="{{route('HOME')}}">Home</a></li>
              <li class="active">Payment</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div>

        <center>

        </center>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            @php
                $total = 0;    
            @endphp
            <form action="{{URL('update_cart')}}" method="POST">
                @csrf
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="description">Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::get('cart')==true)

                        @foreach(Session::get('cart') as $key => $cart)
                            @php
                                $subtotal = $cart['product_price'] * $cart['product_qty'];
                                $total = $total + $subtotal;    
                            @endphp
                        <tr>
                            <td class="cart_product">
                                <img src="{{URL('public/uploads/'.$cart['product_image'])}}" width="150" alt="">
                            </td>
                            <td class="cart_description">
                                <h4>{{$cart['product_name']}}</h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($cart['product_price'],0,',','.')}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($subtotal,0,',','.')}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL('delete_cart/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                        @endforeach
                        <tr>
                            <td> <input type="submit" class="btn btn-default update" value="Update"></td>
                        </tr>
                        @else
                        <tr>
                           <td colspan="5">
                            <center>
                            @php
                            echo 'Your cart is empty!
                            Please add product to cart!!';
                            @endphp
                            </center>
                           </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </form>
        </div>


        {{-- <h4 style="margin:40px 0;font-size: 20px;">Chọn hình thức thanh toán</h4> --}}
            <div class="payment-options">
                <form>
                    @csrf
                        <?php
                        $getCustomerName = Session::get('shipping_name');
                        $getCustomerEmail = Session::get('customer_email');
                        $getCustomerPhone = Session::get('customer_phone');
                        $getShippingNote = Session::get('shipping_note');
                        $getShippingAddress = Session::get('shipping_address');
                        $getShippingMethod = Session::get('shipping_method');
                        // $getRandomOrderCode = Session::get('random_order_code');
                        // $getProductId = Session::get('product_id');
                        // $getProductName = Session::get('product_name');
                        // $getProductPrice = Session::get('product_price');
                        // $getProductQuantity = Session::get('product_sales_quantity');
                        if($getCustomerName && $getCustomerEmail && $getCustomerPhone && $getShippingNote &&  $getShippingAddress){
                            echo "<input type='hidden' name='shipping_name' value='$getCustomerName' class='shipping_name form-control'>
                            <input type='hidden' name='shipping_email' value='$getCustomerEmail' class='shipping_email form-control'>
                            <input type='hidden' name='shipping_phone' value='$getCustomerPhone' class='shipping_phone form-control'>
                            <input type='hidden' name='shipping_note' value='$getShippingNote' class='shipping_note form-control'>
                            <input type='hidden' name='shipping_address' value='$getShippingAddress' class='shipping_address form-control'>
                            ";
                        }
                        if($getShippingMethod == 1){
                            echo "<input type='hidden' name='shipping_method' value='1' class='shipping_method form-control'>";
                        }else{
                            echo "<input type='hidden' name='shipping_method' value='0' class='shipping_method form-control'>";
                        }
                        ?>

              

                    @if(Session::get('fee'))
                        <input type="hidden" class="order_fee" value="{{Session::get('fee')}}">
                    @endif

                    @if (Session::get('coupon'))
                        @foreach(Session::get('coupon') as $key => $cou)
                        <input type="hidden" name="product_coupon" class="product_coupon form-control" value="{{$cou['coupon_code']}}">
                        @endforeach
                    @else 
                        <input type="hidden" name="product_coupon" class="product_coupon" value="no">
                    @endif
                    
                    
                    <div>
                        @php
                            $real_coupon = 0;
                        @endphp
                        @php
                        $real_coupon2 = 0;
                        @endphp
                        <div class="col-sm-8 a1">
                            <div class="total_area">
                                <ul>
                                    <li>Total: <span>{{number_format($total,0,',','.')}}</span></li>
                                    
                                        @if (Session::get('cart'))
                                            @if (Session::get('coupon'))
                                            <li>
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                    @if($cou['coupon_condition'] == 0)
                                                        @php
                                                            $sale_coupon = ($total*$cou['coupon_number'])/100;
                                                            $real_coupon += $sale_coupon; 
                                                        @endphp
                                                    Coupon: <span>{{$cou['coupon_number']}}%</span> 
                                                    @else
                                                        @php
                                                            $sale_coupon = $total - $cou['coupon_number'];
                                                            $real_coupon += $sale_coupon; 
                                                        @endphp
                                                    Coupon: <span>{{number_format($cou['coupon_number'],0,',','.')}} VND</span>
                                                    @endif
                                                @endforeach
                                            </li>
                                            @endif
                                            @if(Session::get('fee'))
                                            <li>
                                                Phi van chuyen: <span>{{number_format(Session::get('fee'),0,',','.')}} VND</span>
                                                @php
                                                    $total_after_fee = $total + Session::get('fee');
                                                    $real_coupon2 += $total_after_fee; 
                                                @endphp
                                            </li>
                                            @endif
                                        @endif
                                        
                                    @if (Session::get('coupon') && !Session::get('fee'))
                                    <li>Tong da giam: <span>{{number_format($real_coupon,0,',','.')}}</span></li>
                                    @elseif(!Session::get('coupon') && Session::get('fee'))
                                    <li>Tong da giam: <span>{{number_format($real_coupon2,0,',','.')}}</span></li>
                                    @elseif(Session::get('coupon') && Session::get('fee'))
                                            @php
                                                $CouponAndFee = $real_coupon + Session::get('fee');
                                            @endphp
                                    <li>Tong da giam: <span>{{number_format($CouponAndFee,0,',','.')}}</span></li>
                                    @elseif(!Session::get('coupon') && !Session::get('fee'))
                                    <li>Tong da giam: <span>{{number_format($total,0,',','.')}}</span></li>
                                    @endif
                                </ul>
                                    <a class="btn btn-primary btn-sm update" href="{{URL('remove_cart')}}">Remove Cart</a>
                                    {{-- <img src="{{URL('public/FE/images/vnpayqr.png')}}" href="{{URL('vnpay')}}" alt=""> --}}
                                    <input type="button" value="Confirm Order" class="btn btn-primary btn-sm send_order">
                            </div>
                        </div>
                    </div>
                    {{-- <input type="submit" value="Xac nhan don hang" class="btn btn-primary btn-sm send_order"> --}}
                </form>
            </div>

            
        
    </div>
    <style>
        .btnPaypal{
            margin-left: 50px;
            margin-top: 20px;
        }
    </style>
    <div class="col-md-12 btnPaypal">
        @if (Session::get('coupon') && !Session::get('fee'))
            @php
                $vnd_to_usd = $real_coupon/23083;
            @endphp
        @elseif(!Session::get('coupon') && Session::get('fee'))
            @php
                $vnd_to_usd = $real_coupon2/23083;
            @endphp
        @elseif(Session::get('coupon') && Session::get('fee'))
            @php
                $vnd_to_usd = $CouponAndFee/23083;
            @endphp
        @elseif(!Session::get('coupon') && !Session::get('fee'))
            @php
                $vnd_to_usd = $total/23083;
            @endphp
        @endif
        <div id="paypal-button">
            <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
        </div>
        <a class="hihi" href="{{URL('vnpay')}}">
            <img src="{{URL('FE/images/vnpayqr.png')}}" class="image1" width="90" alt="">
         </a>
         <style>
             .image1{
                margin-top:18px;
                margin-left:30px;
             }
         </style>
    </div>
</section>


@endsection