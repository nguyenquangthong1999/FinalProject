<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\Coupon;

class CartController extends Controller
{
    public function show_cart_quantity(){
        $count_quantity_cart = count(Session::get('cart'));
        echo $count_quantity_cart;
    }

    public function show_cart(Request $request){
        $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
        return view('cart.show_cart',compact('categorys','brands'));
    }
    
    public function add_cart(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }

        Session::save();

    } 


    public function delete_cart($session_id){
        $coupon = Session::get('coupon');
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('coupon');
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message','Deleted Successfully!!!');
        }
    }
    
    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] =  $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message','Updated Successfully!!!');
        }else{
            return Redirect()->back()->with('message','Updated Failed!!!');
        }
    }

    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        $cart = Session::get('cart');
        // $result = Coupon::where('coupon_code',$data['coupon_code'])->first();
        // dd($coupon);
        if($cart==true){
            if($coupon==true){
                $count_coupon = $coupon->count();
                if($count_coupon > 0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[] =  array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,
                            );
                            Session::put('coupon',$cou);
                        }   
                    }else{
                        $cou[] =  array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                    }
                }
            Session::put('coupon',$cou);   
            return Redirect()->back()->with('message','Thêm mã coupon thành công');
            }else{
                return Redirect()->back()->with('error','Ma ko ton tai');
            } 
        }else{
            return Redirect()->back()->with('error','Please add product to cart!!!');
            // thêm giỏ hàng trước rồi mới được thêm mã coupon
        }
    }

    public function remove_cart(){
        $coupon = Session::get('coupon');
        $cart = Session::get('cart');
        if(($cart==true) || ($coupon==true)){
            Session::forget('cart');
            Session::forget('coupon');
            return Redirect()->back()->with('message','Remove Cart Successfully!!!');
        }else{
            return Redirect()->back()->with('error','Please add product to cart before you want to remove!!!'); 
        }
    }
}
