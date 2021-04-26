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

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <center><h4 class="card-title">Add New Coupon</h4></center>
            <form action="{{URL('add-coupon')}}" method="post" role="form" class="forms-sample">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Name Coupon</label>
                <input type="text" name="coupon_name" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
              @if ($errors->has('coupon_name'))
                <p class="help is-danger" style="color: red">Please enter name!</p>
              @endif
              <div class="form-group">
                <label for="exampleInputName1">Code Coupon</label>
                <input type="text" name="coupon_code" class="form-control" id="exampleInputName1" placeholder="Code">
              </div>
              @if ($errors->has('coupon_code'))
                <p class="help is-danger" style="color: red">Please enter code coupon!</p>
              @endif
              <div class="form-group">
                <label for="exampleInputName1">Quantity</label>
                <input type="text" name="coupon_time" class="form-control" id="exampleInputName1" placeholder="Quantity">
              </div>
              @if ($errors->has('coupon_time'))
                <p class="help is-danger" style="color: red">Please enter quantity!</p>
              @endif
              <div class="form-group">
                <label for="exampleSelectGender">Condition</label>
                <select class="form-control" name="coupon_condition" id="exampleSelectGender">
                    <option value="0">Decreased by percentage</option>
                    <option value="1">Decreased by specific money</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Enter percentage or money</label>
                <input type="text" name="coupon_number" class="form-control" id="exampleInputName1" placeholder="Percentage or money">
              </div>
              @if ($errors->has('coupon_number'))
                <p class="help is-danger" style="color: red">Please percentage or money!</p>
              @endif
              <button type="submit" class="btn btn-gradient-primary btn-icon-text mr-2">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Submit
                </button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection