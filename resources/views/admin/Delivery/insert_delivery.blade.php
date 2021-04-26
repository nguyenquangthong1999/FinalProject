@extends('adminlayout1')
@section('admin_content1')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span>Delivery
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Delivery
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <center><h4 class="card-title">Assign Shipping Fee To Delivery</h4></center>
            <form>
                @csrf
              <div class="form-group">
                <label for="exampleSelectGender">City</label>
                <select name="city" id="city" class="form-control choose city">
                    <option value="">Select City</option>
                    @foreach ($city as $key => $tp)
                        <option value="{{$tp->matp}}">{{$tp->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Province</label>
                <select name="province" id="province" class="form-control province choose">
                    <option value="">Select Province</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Ward</label>
                <select name="ward" id="ward" class="form-control ward">
                    <option value="">Select Ward</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Shipping Fee</label>
                <input type="text" name="fee_ship" class="form-control fee_ship"  placeholder="Shipping Fee">
              </div>
              <button type="submit" name="add_delivery" class="btn btn-gradient-primary btn-icon-text mr-2 add_delivery">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Submit
                </button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
          
          <div id="load_delivery">

          </div>
        </div>
      </div>
  </div>
</div>
@endsection