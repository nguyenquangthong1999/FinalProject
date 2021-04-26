<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | E-Shopper</title>
    <link href="{{asset('FE/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('FE/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('FE/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('FE/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('FE/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('FE/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('FE/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('FE/css/sweetalert.css')}}" rel="stylesheet">    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> thongnqgcd17150@fpt.edu.vn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{Route('HOME')}}"><img src="FE/images/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li>
                                @php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                @endphp
                                @if($customer_id!=NULL && $shipping_id==NULL)
                {{-- neu da dang ky roi ma chua nhap thong tin van chuyen thi se chuyen ve trang checkout de dien thong tin van chuyen --}}
                                <a href="{{ROUTE('CHECKOUT')}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                @elseif($customer_id!=NULL && $shipping_id!=NULL)
                {{-- neu da dang ky va nhap thong tin van chuyen day du o trang checkout thi se chuyen ve trang payment  --}}
                                <a href="{{ROUTE('PAYMENT')}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                @else
                                <a href="{{ROUTE('LOGIN_CHECKOUT')}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                
                            
                                @endif
                                </li>

                                <style>
                                    span.badges{
                                        background: #FE980F;
                                        padding: 5px;
                                        border-radius: 10px;
                                        font-size: 14px;
                                        font-weight: bold;
                                        color:white;
                                    }
                                </style>
                                <li>
                                    <a href="{{URL('show_cart')}}"><i class="fa fa-shopping-cart"></i> Cart
                                        <span class="badges">
                                            <span id="show-cart">0</span>
                                        </span>
                                    </a>
                                </li>
                               
                                <li> 
                                @php
                                    $customer_id = Session::get('customer_id');
                                @endphp
                                @if($customer_id!=NULL)
                                    <a href="{{ROUTE('LOGOUT_CHECKOUT')}}"><i class="fa fa-lock"></i> Logout</a>
                                    {{Session::get('customer_name')}}
                                
                                @else
                                    <a href="{{ROUTE('LOGIN_CHECKOUT')}}"><i class="fa fa-lock"></i> Login</a>
                                @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{route('HOME')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ROUTE('CHECKOUT')}}">Checkout</a></li> 
                                        <li><a href="{{URL('show_cart')}}">Cart</a></li> 
                                        <li><a href="{{ROUTE('LOGIN_CHECKOUT')}}">Login</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Blog List</a></li>
                                        <li><a href="#">Blog Single</a></li>
                                    </ul>
                                </li> 
                                <li><a href="#">404</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span> SHOPPER</h1>
                                    <h2>Provide Supplements</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{URL('FE/images/wheygold.png')}}" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span> SHOPPER</h1>
                                    <h2>Provide Supplements</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{URL('FE/images/wheygold.png')}}" class="girl img-responsive" alt="" />
                                    {{-- <img src="{{URL('FE/images/pricing.png')}}"  class="pricing" alt="" /> --}}
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span> SHOPPER</h1>
                                    <h2>Provide Supplements</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{URL('FE/images/wheygold.png')}}" class="girl img-responsive" alt="" />
                                    {{-- <img src="{{URL('FE/images/pricing.png')}}" class="pricing" alt="" /> --}}
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    @yield('getFECart')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach ($categorys as $showCategory)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{URL('category/'.$showCategory->category_id)}}">
                                            {{$showCategory->category_name}}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach
                        </div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                @foreach ($brands as $showBrand)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="{{URL('brand/'.$showBrand->brand_id)}}">
                                                {{$showBrand->brand_name}}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div><!--/brands_products-->

                        <div class="favorite_products"><!--brands_products-->
                            <h2>Favorites</h2>
                            <div class="panel-group brands-name" id="accordian">

                                <div id="row_wishlist" class="row">    

                                </div>

                            </div>
                        </div><!--/brands_products-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{URL('FE/images/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    @yield('content')
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL('FE/images/iframe1.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL('FE/images/iframe2.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL('FE/images/iframe3.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{URL('FE/images/iframe4.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{URL('FE/images/map.png')}}" alt="" />
                            <p>Greenwich Dietary Supplements</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('FE/js/jquery.js')}}"></script>
    <script src="{{asset('FE/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('FE/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('FE/js/price-range.js')}}"></script>
    <script src="{{asset('FE/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('FE/js/main.js')}}"></script>
    <script src="{{asset('FE/js/sweetalert.min.js')}}"></script>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        var usd = document.getElementById('vnd_to_usd').value;
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
        sandbox: 'ARbSIyF4-UgsikEyNCjU7BJlUIoDiKYzABbTG3vn5q-HB2ibPJyMShCTIrJ9Nk7sHdUDrJuIi_uEvfyj',
        production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
        size: 'small',
        color: 'gold',
        shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
        return actions.payment.create({
            transactions: [{
            amount: {
                total: `${usd}`,
                currency: 'USD'
            }
            }]
        });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            // Show a confirmation message to the buyer
            window.alert('Thank you for your purchase!');
        });
        }
    }, '#paypal-button');

</script>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v9.0'
        });
      };

      (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
      attribution="setup_tool"
      page_id="110308914433186"
    theme_color="#ff7e29"
    logged_in_greeting="Chào bạn! Chào mừng bạn đến với shop."
    logged_out_greeting="Chào bạn! Chào mừng bạn đến với shop.">
    </div>

    
    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
        <i class="fa fa-angle-up"></i>
    </a>

    <script type="text/javascript">
        function view(){
        
        if(localStorage.getItem('data')!=null){

            var data = JSON.parse(localStorage.getItem('data'));

            data.reverse();

            document.getElementById('row_wishlist').style.overflow = 'scroll';
            document.getElementById('row_wishlist').style.height = '300px';
        
            for(i=0;i<data.length;i++){

            var name = data[i].name;
            var price = data[i].price;
            var image = data[i].image;
            var url = data[i].url;

            $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+image+'"></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color:#FE980F">'+price+'</p><a href="'+url+'">Đặt hàng</a></div>');
                }

            }

        }

        view();


        function add_wistlist(clicked_id){
            
            var id = clicked_id;
            var name = document.getElementById('wishlist_productname'+id).value;
            var price = document.getElementById('wishlist_productprice'+id).value;
            var image = document.getElementById('wishlist_productimage'+id).src;
            var url = document.getElementById('wishlist_producturl'+id).href;

            var newItem = {
                'url':url,
                'id' :id,
                'name': name,
                'price': price,
                'image': image
            }

            if(localStorage.getItem('data')==null){
                localStorage.setItem('data', '[]');
            }

            var old_data = JSON.parse(localStorage.getItem('data'));

            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })

            if(matches.length){
                alert('Sản phẩm bạn đã yêu thích,nên không thể thêm');

            }else{

                old_data.push(newItem);

                $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+newItem.image+'"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div>');

            }
            
            localStorage.setItem('data', JSON.stringify(old_data));

            
        }
    </script>

    <script type="text/javascript">
            show_cart();
            function show_cart(){
                $.ajax({
                    url: '{{url('show_cart_quantity')}}',
                    method: 'GET',
                    success:function(data){
                        $('#show-cart').html(data);
                    }
                })
            }

        $(document).ready(function(){
            $('.add-to-cart').click(function(){

                var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                // var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url: '{{url('add_cart')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                        success:function(){
                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    // $('#show-cart').html(data);
                                    window.location.href = "{{url('show_cart')}}";
                                });
                            show_cart();
                        }

                    });


                
            });

        });
    </script>

    <script type="text/javascript">
        $('.choose1').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // console.log(_token);
            if(action == 'city'){
                result = 'province';
            }else{
                result = 'ward';
            }
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                url: '{{url('select_delivery_home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            })
        });

        $('.calculate_delivery').click(function(){
            var ma_id = $('.choose1').val();
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid =  $('.ward').val();
            var shipping_name = $('.shipping_name').val();
            var shipping_email = $('.shipping_email').val();
            var shipping_phone = $('.shipping_phone').val();
            var shipping_address = $('.shipping_address').val();
            var shipping_note =  $('.shipping_note').val();
            var shipping_method = $('.shipping_method').val();
            // var product_coupon =  $('.product_coupon').val();
            // var order_fee = $('.order_fee').val();
            var _token = $('input[name="_token"]').val();
            // alert(product_coupon);
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            if(matp == '' && maqh == '' && xaid == ''){
                alert(' chọn địa chỉ để tính phí vận chuyển!')
            }
            else{
                $.ajax({
                url: '{{url('calculate_fee')}}',
                method: 'POST',
                data:{
                    matp,
                    maqh,
                    xaid,
                    ma_id,
                    _token,
                    shipping_name,
                    shipping_email,
                    shipping_phone,
                    shipping_address,
                    shipping_note,
                    shipping_method,
                    // product_coupon,
                    // order_fee
                    },
                success:function(data){
                    window.location.href = "{{url('payment')}}";
                    // alert(shipping_name);
                }
            })
            }
           
        });

        $('.send_order').click(function(){
            swal({
                title: "Order confirmation",
                text: "Orders will not be refunded when placed, do you want to order?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnCancel: false,
                closeOnConfirm: false
                },
            function(isConfirm){
                if (isConfirm) {
                    var shipping_name = $('.shipping_name').val();
                    var shipping_email = $('.shipping_email').val();
                    var shipping_phone = $('.shipping_phone').val();
                    var shipping_address = $('.shipping_address').val();
                    var shipping_note =  $('.shipping_note').val();
                    var shipping_method = $('.shipping_method').val();
                    var product_coupon =  $('.product_coupon').val();
                    var order_fee = $('.order_fee').val();
                    var _token = $('input[name="_token"]').val();
                
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });

                    $.ajax({
                    url: '{{url('confirm_order')}}',
                    method: 'POST',
                    data:{
                        // matp,
                        // maqh,
                        // xaid,
                        // ma_id,
                        _token,
                        shipping_name,
                        shipping_email,
                        shipping_phone,
                        shipping_address,
                        shipping_note,
                        shipping_method,
                        product_coupon,
                        order_fee
                        },
                        success:function(data){
                            // window.location.href = "{{url('payment')}}";
                            swal("Order", "Your order has been sent successfully!", "success");
                        }
                    });
                    // window.setTimeout(function(){
                    //     location.reload();
                    // } ,3000);
                } else {
                    swal("Cancel order", "Order canceled successfully!", "error");
                }
            });
            // var ma_id = $('.choose1').val();
            // var matp = $('.city').val();
            // var maqh = $('.province').val();
            // var xaid =  $('.ward').val();
            
            
           
        });
    </script>


</body>
</html>