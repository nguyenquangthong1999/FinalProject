@extends('adminlayout1')
@section('admin_content1')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span>Coupon
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Coupon
        </li>
      </ul>
    </nav>
  </div>
  <center>
    <div class="col-sm-5">
      @if(session()->has('message'))
      <div class="alert alert-success">
        {!! session()->get('message') !!}
      </div>
      @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {!! session()->get('error') !!}
      </div>
      @endif
   </div>
  </center>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <center><h4 class="card-title">Manage Coupon</h4></center>
            </p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Name Coupon </th>
                  <th> Code Coupon </th>
                  <th> Quantity </th>
                  <th> Condition </th>
                  <th> Discount </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach($coupon as $getCoupon)
                <tr>
                  <td> {{$loop->iteration}} </td>
                  <td> {{$getCoupon->coupon_name}} </td>
                  <td> {{$getCoupon->coupon_code}} </td>
                  <td> {{$getCoupon->coupon_time}} </td>
                  <td>
                    @if ($getCoupon->coupon_condition == 0)
                        Decreased by percentage
                    @else
                        Decreased by specific money
                    @endif
                  </td>
                  <td> 
                    @if ($getCoupon->coupon_condition == 0)
                        Decreased {{$getCoupon->coupon_number}} %
                    @else
                        Decreased {{$getCoupon->coupon_number}} VNĐ
                    @endif
                  </td>
                  <td>
                    <a href="{{URL('delete_coupon/'.$getCoupon->coupon_id)}}" onclick="return confirm('Are you sure?')" ui-toggle-class="" >
                        <i class="fa fa-times text-danger text"></i>
                    </a>{{-- delete --}}
                  </td>
                </tr>
              </tbody>
                @endforeach
            </table>
          </div>
        </div>
    </div>
</div>
@endsection