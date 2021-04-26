 @extends('welcome')
 @section('content')
 <div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($a_product as $getProduct)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        @csrf
                    <input type="hidden" id="wishlist_productname{{$getProduct->product_id}}" value="{{$getProduct->product_name}}" class="cart_product_name_{{$getProduct->product_id}}">
                    <input type="hidden" id="wishlist_productprice{{$getProduct->product_id}}" value="{{number_format($getProduct->product_price,0,',','.')}}VNĐ">
                    
                    <input type="hidden" value="{{$getProduct->product_id}}" class="cart_product_id_{{$getProduct->product_id}}">
                    <input type="hidden" value="{{$getProduct->product_name}}" class="cart_product_name_{{$getProduct->product_id}}">
                    <input type="hidden" value="{{$getProduct->product_image}}" class="cart_product_image_{{$getProduct->product_id}}">
                    <input type="hidden" value="{{$getProduct->product_price}}" class="cart_product_price_{{$getProduct->product_id}}">
                    <input type="hidden" value="1" class="cart_product_qty_{{$getProduct->product_id}}">
                    <a id="wishlist_producturl{{$getProduct->product_id}}" href="{{URL('detailproduct/'.$getProduct->product_id)}}">
                        <img id="wishlist_productimage{{$getProduct->product_id}}" src="{{URL('public/uploads/'.$getProduct->product_image)}}" alt="" />
                    </a>
                    <h2>{{number_format($getProduct->product_price)}} VNĐ</h2>
                    <p>{{$getProduct->product_name}}</p>
                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$getProduct->product_id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </form>
                </div>
                    {{-- <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div> --}}
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <style type="text/css">

                        ul.nav.nav-pills.nav-justified li {
                            text-align: center;
                            font-size: 13px;
                        }
                        .button_wishlist{
                            border: none;
                            background: #ffff;
                            color: #B3AFA8;
                        }
                        ul.nav.nav-pills.nav-justified i {
                            color: #B3AFA8;
                        }
                        .button_wishlist span:hover {
                            color: #FE980F;
                        }
                    
                        .button_wishlist:focus {
                            border: none;
                            outline: none;
                        }
                      
                    </style>
                    <li>
                        <i class="fa fa-plus-square"></i>

                    <button class="button_wishlist" id="{{$getProduct->product_id}}" onclick="add_wistlist(this.id);">
                        <span>Add to favorite</span>
                    </button>

                   </li>
                    </li>
                <li>
                    <a href="#"><i class="fa fa-plus-square"></i>Add to compare</a>
                </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div><!--features_items-->


@endsection