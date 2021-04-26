<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Session;
use DB;
use Carbon\Carbon;
use App\Coupon;
use App\Customer;
use App\CatePost;
use App\CategoryProduct;
use App\Product;

class MailController extends Controller
{
    public function quen_mat_khau(Request $request){
       $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
       $brands = DB::table('brand')->orderBy('brand_id','desc')->get();
       return view('checkout.forget_pass',compact('categorys','brands'));
    }

    public function recover_pass(Request $request){
    $data = $request->all();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
    $title_mail = "Retrieve the customer password".' '.$now;
    $customer = Customer::where('customer_email','=',$data['email_account'])->get();
    foreach($customer as $key => $value){
        $customer_id = $value->customer_id;
    }
    
    if($customer){
        $count_customer = $customer->count();
        if($count_customer==0){
            return redirect()->back()->with('error', 'Email is not registered!');
        }else{
               $token_random = Str::random();
            $customer = Customer::find($customer_id);
            $customer->customer_token = $token_random;
            $customer->save();
            
          
            $to_email = $data['email_account'];
            $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);
         
            $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['email_account']); //body of mail.blade.php
            
            Mail::send('checkout.forget_pass_notify', ['data'=>$data] , function($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            });
            
            return redirect()->back()->with('message', 'Email sent successfully! Please check your email to reset password.');
        }
        }
    }

   public function reset_new_pass(Request $request){
    $data = $request->all();
    $token_random = Str::random();
    $customer = Customer::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
    $count = $customer->count();
    if($count>0){
            foreach($customer as $key => $cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = $data['password_account'];
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect()->route('LOGIN_CHECKOUT')->with('message', 'Newly updated password! Please login again.');
    }else{
        return redirect('quen-mat-khau')->with('error', 'Please re-enter your email because the link is out of date!');
    }
   }

   public function update_new_pass(Request $request){
    $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    $brands = DB::table('brand')->orderBy('brand_id','desc')->get();

   return view('checkout.new_pass',compact('categorys','brands'));
   }
}
