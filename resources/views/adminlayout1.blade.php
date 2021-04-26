<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('BE1/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('BE1/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('BE1/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('BE1/images/favicon.ico')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  </head>
  
  <body>
    <div class="container-scroller">

      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="{{Route('DASHBOARD')}}"><img src="{{URL('BE1//images/logo.svg')}}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="{{Route('DASHBOARD')}}"><img src="{{URL('BE1/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{URL('BE1/images/thong.png')}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">
                    <?php
                        $admin_name = Session::get('admin_name');
                        if($admin_name){
                            echo $admin_name;
                        }
                    ?>
                  </p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('LOGIN_ADMIN')}}">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>

      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{URL('BE1/images/thong.png')}}" alt="profile">
                  <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">
                    <?php
                        $admin_name = Session::get('admin_name');
                        if($admin_name){
                            echo $admin_name;
                        }
                    ?>
                  </span>
                  <span class="text-secondary text-small">Super Admin</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route('DASHBOARD')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('ADD_CATE')}}">Add Category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('ALL_CATE')}}">Manage Category</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="brand">
                <span class="menu-title">Brand</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="brand">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('ADD_BRAND')}}">Add Brand</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('ALL_BRAND')}}">Manage Brand</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('ADD_PRODUCT')}}">Add Product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('ALL_PRODUCT')}}">Manage Product</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#coupon" aria-expanded="false" aria-controls="coupon">
                <span class="menu-title">Coupon</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="coupon">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('ADD_COUPON')}}">Add Coupon</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('ALL_COUPON')}}">Manage Coupon</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#feeship" aria-expanded="false" aria-controls="feeship">
                <span class="menu-title">Shipping Fee</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="feeship">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('INSERT_DELIVERY')}}">Add Feeship</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">
                <span class="menu-title">Order</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="order">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('MANAGER_ORDER')}}">Manage Order</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">Admin</button>
              </span>
            </li>
          </ul>
        </nav>

        <div class="main-panel">
          @yield('admin_content1')
        </div>

      </div>
     
    </div>

    <script src="{{asset('BE1/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('BE1/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('BE1/js/off-canvas.js')}}"></script>
    <script src="{{asset('BE1/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('BE1/js/misc.js')}}"></script>
    <script src="{{asset('BE1/js/dashboard.js')}}"></script>
    <script src="{{asset('BE1/js/todolist.js')}}"></script>
    <script src="{{asset('BE1/js/file-upload.js')}}"></script>
  </body>
</html>
<script>
  $(document).ready(function(){
      fetch_delivery();
      function fetch_delivery(){
          var _token = $('input[name="_token"]').val();
          $.ajax({
              url: '{{url('loadfeeship')}}',
              method: 'POST',
              data:{_token:_token,},
              success:function(data){
                  $('#load_delivery').html(data);
              }
          })
      };

      $(document).on('blur','.fee_feeship_edit',function(){

          var feeship_id = $(this).data('feeship_id');
          var fee_value = $(this).text();
          var _token = $('input[name="_token"]').val();
          // alert(feeship_id);
          // alert(fee_value);
          $.ajax({
              url : '{{url('update_delivery')}}',
              method: 'POST',
              data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
              success:function(data){
              fetch_delivery();
              }
          });

      });
      
      $('.add_delivery').click(function(){
          event.preventDefault();
          // alert('1');
          var city = $('.city').val();
         var province = $('.province').val();
         var ward = $('.ward').val();
         var fee_ship = $('.fee_ship').val();
          var _token = $('input[name="_token"]').val();
          // alert('1');
          // alert(getFeeship);

          $.ajax({
              url: '{{url('delivery')}}',
              method: 'POST',
              data:{city:city,province:province,ward:ward,_token:_token,fee_ship:fee_ship},
              success:function(data){
                  fetch_delivery();
              }
          })
      });

      $('.choose').on('change',function(){
          var action = $(this).attr('id');
          var ma_id = $(this).val();
          var _token = $('input[name="_token"]').val();
          var result = '';
          // alert(action,matp,_token);
          if(action == 'city'){
              result = 'province';
          }else{
              result = 'ward';
          }
          // $.ajaxSetup({
          // headers: {
          //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
          // }
          // });

          $.ajax({
              url: '{{url('select_delivery')}}',
              method: 'POST',
              data:{action:action,ma_id:ma_id,_token:_token},
              success:function(data){
                  $('#'+result).html(data);
              }
          })
      })
  })
</script>