<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feeship;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Customer;
use App\Coupon;

class OrderController extends Controller
{
    public function manager_order(){
        $order = Order::orderBy('created_at','DESC')->get();
        return view('admin.Order.manager_order',compact('order'));
    }

    public function view_order($order_code){
        $order_details = OrderDetails::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        
        $order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();
        foreach($order_details_product as $key => $order_d){
            $product_coupon = $order_d->product_coupon;
        }

        if($product_coupon != 'no'){
			$coupon = Coupon::where('coupon_code',$product_coupon)->first();

			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;

			// if($coupon_condition==0){
			// 	$coupon_echo = $coupon_number.'%';
			// }elseif($coupon_condition==1){
			// 	$coupon_echo = number_format($coupon_number,0,',','.').'đ';
			// }
		}else{
			$coupon_condition = 1;
			$coupon_number = 0;

			$coupon_echo = '0';

		}

        return view('admin.Order.view_order',compact('order_details','customer','shipping','order_details_product','coupon_number','coupon_condition'));
    }

    public function delete_order($order_code){
        Order::where('order_code',$order_code)->delete();
        // Order::find($order_code)->delete();
        return Redirect()->route('MANAGER_ORDER')->with('message','Delete Order Successfully!');
    }
}
