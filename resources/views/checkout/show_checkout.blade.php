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
              <li class="active">Check out</li>
            </ol>
        </div>

        <div class="register-req">
            <p>Please check your account information!</p>
        </div>

        <div class="shopper-informations">
            <div class="row">
                <style type="text/css">
                    .col-md-7.form-style input[type=text] {
                        margin: 5px 0;
                    }

                    .send_order{
                        position: absolute;
                        left: 400px;
                        top: 280px;
                        width: 150px;
                    }
                </style>
            
                <div class="col-md-12 clearfix">
                    <div class="bill-to">
                        <p>Check customer information</p>
                        <form>
                            <div class="col-md-7 form-style">

                                    @csrf
                                    <?php
                                    $getCustomerName = Session::get('customer_name');
                                    $getCustomerEmail = Session::get('customer_email');
                                    $getCustomerPhone = Session::get('customer_phone');
                                    // $getCoupon = Session::get('coupon');
                                    if($getCustomerName && $getCustomerEmail && $getCustomerPhone){
                                        echo "<input type='text' name='shipping_name' value='$getCustomerName' class='shipping_name form-control'>
                                        <input type='text' name='shipping_email' value='$getCustomerEmail' class='shipping_email form-control'>
                                        <input type='text' name='shipping_phone' value='$getCustomerPhone' class='shipping_phone form-control'>
                                        ";
                                    }

                                    // if($getCoupon){
                                    //     foreach ($getCoupon as $key => $cou) {
                                    //         echo "<input type='hidden' name='product_coupon' value='{$cou['coupon_code']}' class='product_coupon form-control'>";
                                    //     }
                                    // }
                                        
                                    ?>
                                    
                                    <input type="text" name="shipping_address" placeholder="Address Specification" class='shipping_address form-control'>
                                    <textarea name="shipping_note" placeholder="Notes" class="shipping_note form-control" rows="5"></textarea>
                                   
                                    @if (Session::get('coupon'))
                                        @foreach(Session::get('coupon') as $key => $cou)
                                        <input type="hidden" name="product_coupon" class="product_coupon form-control" value="{{$cou['coupon_code']}}">
                                        @endforeach
                                    @else 
                                        <input type="hidden" name="product_coupon" class="product_coupon" value="no">
                                    @endif

                                    
                                    
                                    
                                    

                                    {{-- @if(Session::get('coupon')) --}}
                                        {{-- @foreach(Session::get('coupon') as $key => $cou) --}}
                                            {{-- <input type="hidden" name="order_coupon" class="order_coupon" value=""> --}}
                                        {{-- @endforeach --}}
                                    {{-- @else  --}}
                                        {{-- <input type="hidden" name="order_coupon" class="order_coupon" value="no"> --}}
                                    {{-- @endif --}}
                                    
                                    
                                    
                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Choose payment method</label>
                                            <select name="shipping_method"  class="form-control input-sm m-bot15 shipping_method">
                                                    <option value="0">ATM Transfer</option>
                                                    <option value="1">Cash</option>   
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                        {{-- <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery"> --}}
            
            
                                        </div>
                                </form>
                            </div>
                            <div class="col-md-5">	
                                {{-- <form>
                                    @csrf  --}}
                            
                                <div class="form-group">
                                    <label for="exampleInputPassword1">City</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose1 city">
                                    
                                            <option value="">Select City</option>
                                    
                                            @foreach ($city as $key => $tp)
                                                <option value="{{$tp->matp}}">{{$tp->name}}</option>
                                            @endforeach
                                        
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Province</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 province choose1">
                                            <option value="">Select Province</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ward</label>
                                    <select name="ward" id="ward" class="form-control input-sm m-bot15 ward">
                                            <option value="">Select Ward</option>   
                                    </select>
                                </div>
                            </div>
                            <style>
                                .calculate_delivery{
                                    margin-left: 15px;
                                }
                            </style>
                            <input type="button" value="Continue" name="calculate_order" class="btn btn-primary calculate_delivery">
                        </form>
                   
       

    </div>
</section>
@endsection