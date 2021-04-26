@extends('adminlayout1')
@section('admin_content1')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span>Order
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Order
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Information Order</h4>
          <table class="table table-bordered">
            <thead>
              <tr class="table-danger">
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Note</th>
                <th>Payment Method</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$shipping->shipping_name}}</td>
                <td>{{$shipping->shipping_address}}</td>
                <td>{{$shipping->shipping_phone}}</td>
                <td>{{$shipping->shipping_email}}</td>
                <td>{{$shipping->shipping_note}}</td>
                <td>
                    @if($shipping->shipping_method==0) 
                    ATM Transfer 
                    @else 
                    Cash 
                    @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Order Details</h4>
          <table class="table table-bordered">
            <thead>
              <tr class="table-info">
                <th>
                  No
                </th>
                <th>Name</th>
                <th>Coupon Code</th>
                <th>Shipping Fee</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @php 
              $i = 0;
              $total = 0;
              @endphp
              @foreach($order_details as $key => $details)
    
              @php 
              $i++;
              $subtotal = $details->product_price*$details->product_sales_quantity;
              $total+=$subtotal;
              @endphp
              <tr class="color_qty_{{$details->product_id}}">
                <td>{{$i}}</td>
                <td>{{$details->product_name}}</td>
                <td>
                  @if($details->product_coupon!='no')
                  {{$details->product_coupon}}
                  @else 
                  No coupon code applied
                  @endif
                </td>
                <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
                <td>{{$details->product_sales_quantity}}</td>
                <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
                <td>{{number_format($subtotal ,0,',','.')}}đ</td>
              </tr>
              @endforeach
              <tr>
                <td colspan="2">  
                  @php 
                  $total_coupon = 0;
                  @endphp
                  @if($coupon_condition==0)
                  @php
                  $total_after_coupon = ($total*$coupon_number)/100;
                  echo 'Total decreased: '.number_format($total_after_coupon,0,',','.').'</br>';
                  $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
                  @endphp
                  @else 
                  @php
                  echo 'Total decreased:'.number_format($coupon_number,0,',','.').'k'.'</br>';
                  $total_coupon = $total + $details->product_feeship - $coupon_number ;
    
                  @endphp
                  @endif
    
                  Shipping fee: {{number_format($details->product_feeship,0,',','.')}}đ</br> 
                  Total: {{number_format($total_coupon,0,',','.')}}đ 
              
                </td>
              </tr>
            </tbody>
          </table> 
          {{-- <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">In đơn hàng</a> --}}
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
