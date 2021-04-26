@extends('adminlayout1')
@section('admin_content1')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span>Category
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Category
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <center><h4 class="card-title">Update Category</h4></center>
            <form action="{{ route('category-product.update', $categoryProduct->category_id) }}" method="post" role="form" class="forms-sample">
                @csrf
                @method('put')
              <div class="form-group">
                <label for="exampleInputName1">Name Category</label>
                <input type="text" name="category_name" value="{{ old('category_name', $categoryProduct->category_name) }}" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
              @if ($errors->has('category_name'))
                <p class="help is-danger" style="color: red">Please enter name!</p>
              @endif
              <div class="form-group">
                <label for="exampleTextarea1">Desciption</label>
                <textarea class="form-control" name="category_desc" id="exampleTextarea1" rows="5">{{ old('category_desc', $categoryProduct->category_desc) }}</textarea>
              </div>
              @if ($errors->has('category_desc'))
                <p class="help is-danger" style="color: red">Please write desciption!</p>
              @endif
              <div class="form-group">
                <label for="exampleSelectGender">Status</label>
                <select class="form-control" name="category_status" id="exampleSelectGender">
                  <option value="0" {{ old('category_status', $categoryProduct->category_status) == 0 ? 'selected' : '' }} >Hide</option>
                  <option value="1" {{ old('category_status', $categoryProduct->category_status) == 1 ? 'selected' : '' }} >Show</option>
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