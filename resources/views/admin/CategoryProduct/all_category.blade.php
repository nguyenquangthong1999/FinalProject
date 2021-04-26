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
            <center><h4 class="card-title">Manage Category</h4></center>
            </p>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> No </th>
                  <th> Name Category </th>
                  <th> Description </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $cate_pro)
                <tr>
                  <td> {{$loop->iteration}} </td>
                  <td> {{$cate_pro->category_name}} </td>
                  <td> {{$cate_pro->category_desc}} </td>
                  <td> 
                      @if ($cate_pro->category_status == 0)
                        Hide
                      @else
                        Show
                      @endif 
                  </td>
                  <td>
                    <a href="{{ route('category-product.edit', $cate_pro->category_id) }}" ui-toggle-class="">
                    <i class="fa fa-check text-success text-active"></i>{{-- edit --}}
                    </a>
                    <a href="{{URL('delete-category/'.$cate_pro->category_id)}}" onclick="return confirm('Are you sure?')" ui-toggle-class="" >
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