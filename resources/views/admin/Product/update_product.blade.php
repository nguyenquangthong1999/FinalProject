@extends('adminlayout1')
@section('admin_content1')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span>Product
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Product
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <center><h4 class="card-title">Update Product</h4></center>
            @foreach ($edit_product as $edit)
            <form action="{{URL('update-product/'.$edit->product_id)}}" method="post" role="form" class="forms-sample" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Name Product</label>
                <input type="text" name="product_name" value="{{ old('product_name', $edit->product_name) }}" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
              @if ($errors->has('product_name'))
                <p class="help is-danger" style="color: red">Please enter name!</p>
              @endif
              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="product_image" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                </div>
                <img src="{{URL('public/uploads/'.$edit->product_image)}}" width="100px" height="100px">
              </div>
              @if ($errors->has('product_image'))
                <p class="help is-danger" style="color: red">Please upload image!</p>
              @endif
              <div class="form-group">
                <label for="exampleInputName1">Price</label>
                <input type="text" name="product_price" value="{{ old('product_price', $edit->product_price) }}" class="form-control" id="exampleInputName1" placeholder="Price">
              </div>
              @if ($errors->has('product_price'))
                <p class="help is-danger" style="color: red">Please enter price!</p>
              @endif
              <div class="form-group">
                <label for="exampleFormControlSelect3">Category</label>
                <select name="cate" class="form-control form-control-sm" id="exampleFormControlSelect3">
                    @foreach($categorys as $category)
                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect3">Brand</label>
                <select name="brand" class="form-control form-control-sm" id="exampleFormControlSelect3">
                    @foreach($brands as $brand)
                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                   @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-gradient-primary btn-icon-text mr-2">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>Update
                </button>
              <button class="btn btn-light">Cancel</button>
            </form>
            @endforeach
          </div>
        </div>
      </div>
  </div>
</div>
@endsection