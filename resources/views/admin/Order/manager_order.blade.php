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
            <center><h4 class="card-title">Manage Order</h4></center>
            </p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Code Orders </th>
                  <th> Order status </th>
                  <th> Date of order </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach($order as $ord)
                <tr>
                  <td> {{$loop->iteration}} </td>
                  <td> {{$ord->order_code}} </td>
                  <td>
                    @if($ord->order_status==1)
                        New orders
                    @else 
                        Processed - Delivered
                    @endif
                  </td>
                  <td>{{$ord->created_at}}</td>
                  <td>
                    <a href="{{URL('view_order/'.$ord->order_code)}}" ui-toggle-class="">
                      <i class="fa fa-eye text-active"></i>
                    </a>
                    <a href="{{URL('delete_order/'.$ord->order_code)}}" onclick="return confirm('Are you sure?')" ui-toggle-class="" >
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