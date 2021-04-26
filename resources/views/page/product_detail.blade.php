@extends('welcome')
@section('content')
@foreach($getDetail as $detail)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL('public/uploads/'.$detail->product_image)}}" alt="" />
        </div>
    </div>

    <div class="col-sm-7">
        <div class="product-information">
            <img src="{{URL('FE/images/new.jpg')}}" class="newarrival"/>
            <h2>{{$detail->product_name}}</h2>
            <p>Product ID: {{$detail->product_id}}</p>
            <img src="{{URL('FE/images/rating.png')}}" alt="" />
            <form>
                @csrf
                    <input type="hidden" value="{{$detail->product_id}}" class="cart_product_id_{{$detail->product_id}}">
                    <input type="hidden" value="{{$detail->product_name}}" class="cart_product_name_{{$detail->product_id}}">
                    <input type="hidden" value="{{$detail->product_image}}" class="cart_product_image_{{$detail->product_id}}">
                    <input type="hidden" value="{{$detail->product_price}}" class="cart_product_price_{{$detail->product_id}}">
                <span>
                    <span>{{number_format($detail->product_price,0,',','.')}} VNĐ</span>
                    <label>Quantity:</label>
                    <input type="number" min="1" class="cart_product_qty_{{$detail->product_id}}" value="1" />
                    <input name="productid_hidden" type="hidden"  value="{{$detail->product_id}}" />
                </span>
                <button type="button" class="btn btn-fefault add-to-cart" data-id_product="{{$detail->product_id}}"><i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
            </form>
            
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Category:</b> {{$detail->category_name}}</p>
            <p><b>Brand:</b> {{$detail->brand_name}}</p>
            <a href=""><img src="{{URL('FE/images/share.png')}}" class="share img-responsive"  alt="" /></a>
        </div>
    </div>
</div><!--/product-details-->



<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#companyprofile" data-toggle="tab">Nutrition</a></li>
            <li><a href="#details" data-toggle="tab">Description</a></li>
            <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
    </div>
    <div class="tab-content ">
        <div class="tab-pane fade active in" id="companyprofile" >
            <div class="col-sm-3">
                <img src="{{URL('FE/images/nutrition.jpg')}}" alt="">
            </div>
        </div>

        
        
        <div class="tab-pane fade" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="{{URL('FE/images/rating.png')}}" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Related Items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($getRelate as $relate)
            <div class="item active">	
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{URL('detailproduct/'.$relate->product_id)}}">
                                 <img src="{{URL('uploads/'.$relate->product_image)}}" alt="" />
                                </a>
                                <h2>{{number_format($relate->product_price)}} VNĐ</h2>
                                <p>{{$relate->product_name}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="item">	
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="FE/images/recommend1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="FE/images/recommend2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="FE/images/recommend3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items-->
@endforeach
@endsection