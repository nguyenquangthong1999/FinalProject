<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Coupon;
use DB;
use Session;
use App\Http\Requests\CouponRequest;


class CouponController extends Controller
{

    // public function check_coupon(Request $request){
    //     $data = $request->all();
    //     $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
    //     if($coupon){
    //         $count_coupon = $coupon->count();
    //         if($count_coupon > 0){
    //             $coupon_session = Session::get('coupon');
    //             if($coupon_session==true){
    //                 $is_avaiable = 0;
    //                 if($is_avaiable==0){
    //                     $cou[] =  array(
    //                         'coupon_code' => $coupon->coupon_code,
    //                         'coupon_condition' => $coupon->coupon_condition,
    //                         'coupon_number' => $coupon->coupon_number,
    //                     );
    //                     Session::put('coupon',$cou);
    //                 }
    //             }else{
    //                 $cou[] =  array(
    //                     'coupon_code' => $coupon->coupon_code,
    //                     'coupon_condition' => $coupon->coupon_condition,
    //                     'coupon_number' => $coupon->coupon_number,
    //                 );
    //                 Session::put('coupon',$cou);
    //             }
    //             Session::save();
    //             return Redirect()->back()->with('message','Add coupon Successfully!!!');
    //         }
    //     }else{
    //         return Redirect()->back()->with('error','Ma giam gia ko dung');
    //     }
    // }

    public function add_coupon(){
        return view('admin.Coupon.add_coupon');
    }

    public function add_coupon2(CouponRequest $request){
        $data = $request->all();
        $coupon = new Coupon;
        $coupon->coupon_name =  $data['coupon_name'];
        $coupon->coupon_code =  $data['coupon_code'];
        $coupon->coupon_time =  $data['coupon_time'];
        $coupon->coupon_condition =  $data['coupon_condition'];
        $coupon->coupon_number =  $data['coupon_number'];
        $coupon->save();

        return Redirect()->route('ALL_COUPON')->with('message','Add New Coupon Successfully!');
    }

    public function all_coupon(){
        $coupon = Coupon::orderby('coupon_id','DESC')->get();
        return view('admin.Coupon.all_coupon',compact('coupon'));
    }

    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        return Redirect()->route('ALL_COUPON')->with('message','Delete Coupon Successfully!');
    }
}
