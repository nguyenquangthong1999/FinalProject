@extends('adminlayout1')
@section('admin_content1')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span>Brand
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Brand
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <center><h4 class="card-title">Update Brand</h4></center>
            <form action="{{ route('brand.update', $brand->brand_id) }}" method="post" role="form" class="forms-sample">
                @csrf
                @method('put')
              <div class="form-group">
                <label for="exampleInputName1">Name Brand</label>
                <input type="text" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
              @if ($errors->has('brand_name'))
                <p class="help is-danger" style="color: red">Please enter name!</p>
              @endif
              <div class="form-group">
                <label for="exampleTextarea1">Desciption</label>
                <textarea class="form-control" name="brand_desc" id="exampleTextarea1" rows="5">{{ old('brand_desc', $brand->brand_desc) }}</textarea>
              </div>
              @if ($errors->has('brand_desc'))
                <p class="help is-danger" style="color: red">Please write desciption!</p>
              @endif
              <div class="form-group">
                <label for="exampleSelectGender">Status</label>
                <select class="form-control" name="brand_status" id="exampleSelectGender">
                  <option value="0" {{ old('brand_status', $brand->brand_status) == 0 ? 'selected' : '' }} >Hide</option>
                  <option value="1" {{ old('brand_status', $brand->brand_status) == 1 ? 'selected' : '' }} >Show</option>
                </select>
              </div>
              <button type="submit" class="btn btn-gradient-primary btn-icon-text mr-2">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Update
                </button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
