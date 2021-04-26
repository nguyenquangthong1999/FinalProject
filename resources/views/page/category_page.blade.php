@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
   <h2 class="title text-center">Category Items</h2>
   @foreach($getCategoryItem as $CategoryItem)
   <div class="col-sm-4">
       <div class="product-image-wrapper">
           <div class="single-products">
                   <div class="productinfo text-center">
                    <form>
                        @csrf
                    <input type="hidden" value="{{$CategoryItem->product_id}}" class="cart_product_id_{{$CategoryItem->product_id}}">
                    <input type="hidden" value="{{$CategoryItem->product_name}}" class="cart_product_name_{{$CategoryItem->product_id}}">
                    <input type="hidden" value="{{$CategoryItem->product_image}}" class="cart_product_image_{{$CategoryItem->product_id}}">
                    <input type="hidden" value="{{$CategoryItem->product_price}}" class="cart_product_price_{{$CategoryItem->product_id}}">
                    <input type="hidden" value="1" class="cart_product_qty_{{$CategoryItem->product_id}}">
                    <a href="{{URL('detailproduct/'.$CategoryItem->product_id)}}">
                        <img src="{{URL('public/uploads/'.$CategoryItem->product_image)}}" alt="" />
                    </a>
                    <h2>{{number_format($CategoryItem->product_price)}} VNĐ</h2>
                    <p>{{$CategoryItem->product_name}}</p>
                    <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$CategoryItem->product_id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </form>
                    </div>
           </div>
           <div class="choose">
               <ul class="nav nav-pills nav-justified">
                   <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                   <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
               </ul>
           </div>
       </div>
   </div>
   @endforeach
</div><!--features_items-->


@endsection