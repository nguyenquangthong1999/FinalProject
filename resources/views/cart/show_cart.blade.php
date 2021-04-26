@extends('welcome')
@section('getFECart')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{route('HOME')}}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
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

    </div>
</section>

{{-- 
<section id="hihi">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="total_area">
                            <form action="">
                                @csrf
                                <input type="text" class="form-control" name="coupon" placeholder="Nhap coupon giam gia">
                                <input type="submit" class="btn btn-default check_out" value="Tinh ma coupon">
                            </form>

                </div>
            </div>
        </div>
    </div> --}}
</section>

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
                <form action="{{URL('check_coupon')}}" method="POST">
                        @csrf
                    <ul class="user_info">
                        <li class="single_field zip-field">
                            <label>Coupon Code:</label>
                                <input type="text" name="coupon">
                        </li>
                    </ul>
                    <input type="submit" class="btn btn-default update" value="Get Coupon">
                </form>
                </div>
            </div>
            @php
                $real_coupon = 0;
            @endphp
            <div class="col-sm-6">
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
                            @endif
                        
                        {{-- <li>Tax <span></span></li>
                        <li>Shipping Cost <span></span></li> --}}
                        @if (Session::get('coupon'))
                        <li>Total: <span>{{number_format($real_coupon,0,',','.')}}</span></li>
                        @else
                        <li>Total: <span>{{number_format($total,0,',','.')}}</span></li>
                        @endif
                    </ul>
                    @php
                     $customer_id = Session::get('customer_id');
                     $shipping_id = Session::get('shipping_id');
                    @endphp
                    @if($customer_id==NULL)
                    <a class="btn btn-default update" href="{{ROUTE('LOGIN_CHECKOUT')}}">Order</a>
                    @else 
                    <a class="btn btn-default update" href="{{ROUTE('CHECKOUT')}}">Order</a>
                    @endif
                    {{-- @if($customer_id!=NULL && $shipping_id==NULL)
                    <a class="btn btn-default update" href="{{ROUTE('CHECKOUT')}}">Order</a>  
                    @elseif($customer_id!=NULL && $shipping_id!=NULL)
                    <a class="btn btn-default update" href="{{ROUTE('PAYMENT')}}">Order</a> 
                    @else
                    <a class="btn btn-default update" href="{{ROUTE('LOGIN_CHECKOUT')}}">Order</a>  
                    
                
                    @endif  --}}
                        <a class="btn btn-default update" href="{{URL('remove_cart')}}">Remove Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- <section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Total <span>{{number_format($total,0,',','.')}}</span></li>
                        <li>Tax <span></span></li>
                        <li>Shipping Cost <span></span></li>
                        <li>Total <span></span></li>
                    </ul>
                        <a class="btn btn-default check_out" href="">Payment</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection