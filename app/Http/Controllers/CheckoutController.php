<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\City;
use App\Province;
use App\Ward;
use App\Feeship;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Customer;
use Carbon\Carbon;
use App\Coupon;
use Mail;

class CheckoutController extends Controller
{
    // public function sms(){
    //     $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    // 	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
        
    //     $getCustomerName = Session::get('shipping_name');
    //     $getCustomerPhone = Session::get('shipping_phone');

    //     if(($getCustomerName != NULL) && ($getCustomerPhone != NULL)){
    //         Nexmo::message()->send([
    //             'to'   => $getCustomerPhone,
    //             'from' => 'Vonage APIs',
    //             'text' => 'Please confirm your order'.$getCustomerName,
    //         ]);
    //     }else{
    //         return redirect()->route('Checkout')->with('message','Name or Phone of Customer does not exist!');
    //     }
    // }

    public function logincustomer(Request $request){
        $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
        $email = $request->customer_email;
        $password = $request->customer_password;
        $city = City::orderBy('matp','ASC')->get();
        $result = DB::table('customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result == true){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_email',$result->customer_email);
            Session::put('customer_phone',$result->customer_phone);
            return Redirect()->Route('CHECKOUT')->with('message','Logged in successfully!')->with('categorys',$categorys)->with('brands',$brands)->with('city',$city);
        }else{
            return Redirect()->back()->with('error','Incorrect email or password!');
        }
    }

    public function logincheckout(){
        $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
        return view('checkout.login_checkout',compact('categorys','brands'));
    }

    public function register(Request $request){
        $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        
        $insertData = DB::table('customer')->insertGetId($data);
        Session::put('customer_id',$insertData);
        Session::put('customer_name',$request->customer_name);
        Session::put('customer_email',$request->customer_email);
        Session::put('customer_phone',$request->customer_phone);
        $city = City::orderBy('matp','ASC')->get();
        // insertGetId lấy luôn id(lấy luôn dữ liệu vừa mới đăng ký)
        return Redirect()->Route('CHECKOUT')->with('message','Register New Account Success!')->with('categorys',$categorys)->with('brands',$brands)->with('city',$city);
        // return view('checkout.show_checkout',compact('city','categorys','brands'))->with('message','Register New Account Success!');
    }

    public function checkout(){
        $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
        $city = City::orderBy('matp','ASC')->get();
        return view('checkout.show_checkout',compact('city','categorys','brands'));
    }

    public function savecheckout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_method'] = $request->shipping_method;
        $data['shipping_email'] = $request->shipping_email;
        $shipping_id = DB::table('shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect()->Route('PAYMENT');
    }

    public function logoutcheckout(){
        Session::forget('customer_id');
        Session::forget('coupon');
       
        return Redirect()->Route('LOGIN_CHECKOUT');
       }

    public function payment(){
        // $getCustomerName = Session::get('shipping_name');
        Nexmo::message()->send([
            'to'   => '84905876604',
            'from' => 'Vonage APIs',
            'text' => 'Thank you for your order',
        ]);
        $categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
        return view('checkout.payment',compact('categorys','brands'));
    }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                $output .= '<option>--Chọn quận huyện--</option>';
                foreach($select_province as $key => $province){
                    $output .= '<option value="'.$province->maqh.'">'.$province->name.'</option>';
                }
            }else{
                $select_ward = Ward::where('maqh',$data['ma_id'])->orderBy('xaid','ASC')->get();
                $output .= '<option>--Chọn xã phường--</option>';
                foreach($select_ward as $key => $ward){
                    $output .= '<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                }
            }
        }
        echo $output;
    }

    public function calculate_fee(Request $request){
        $data = $request->all();
        Session::put('shipping_name',$data['shipping_name']);
        Session::put('shipping_note',$data['shipping_name']);
        Session::put('shipping_address',$data['shipping_address']);
        Session::put('shipping_method',$data['shipping_method']);
        
        if(Session::get('cart')){
            foreach(Session::get('cart') as $key => $cart){
                Session::put('product_id',$cart['product_id']);
                Session::put('product_name',$cart['product_name']);
                Session::put('product_price',$cart['product_price']);
                Session::put('product_sales_quantity',$cart['product_qty']);
            }
        }
        
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee',150000);
                    Session::save();
                }
            }
            Session::save();
        }
        // dd($data);
    }

    public function confirm_order(Request $request){
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_note = $data['shipping_note'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $random_order_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $orderstatus = 1;
        $order->order_status = $orderstatus;
        $order->order_code = $random_order_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();
       
        if(Session::get('cart')){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails;
                $order_details->order_code = $random_order_code;
                $order_details->product_id =  $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['product_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }


        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Order confirmation".' '.$now;

        $customer = Customer::find(Session::get('customer_id'));
            
        $data['email'][] = $customer->customer_email;
        //lay gio hang
        if(Session::get('cart')==true){

            foreach(Session::get('cart') as $cart_mail){

            $cart_array[] = array(
                'product_name' => $cart_mail['product_name'],
                'product_price' => $cart_mail['product_price'],
                'product_qty' => $cart_mail['product_qty']
            );

            }
            
        }
        //lay shipping
        if(Session::get('fee')==true){
            $fee = Session::get('fee');
        }
        
        $shipping_array = array(
            'fee' =>  $fee,
            'customer_name' => $customer->customer_name,
            'shipping_name' => $data['shipping_name'],
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_address' => $data['shipping_address'],
            'shipping_note' => $data['shipping_note'],
            'shipping_method' => $data['shipping_method']

        );
        //lay ma giam gia, lay coupon code
        if($data['product_coupon'] != 'no'){
            $coupon = Coupon::where('coupon_code',$data['product_coupon'])->first();
            $coupon_mail = $coupon->coupon_code;
        }else{
            $coupon_mail = 'No use!';
        }

        $ordercode_mail = array(
            'product_coupon' => $coupon_mail,
            'order_code' => $random_order_code,
        );

        Mail::send('mail.mail_order',  ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array ,'code'=>$ordercode_mail] , function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });

        Session::forget('coupon');
        Session::forget('cart');
        Session::forget('fee');
    }


    public function vnpay(Request $request)
    {
        $total = 0;
        $real_coupon = 0;
        $real_coupon2 = 0;
        $total1 = 0;
        

        if(Session::get('cart')){
            foreach(Session::get('cart') as $key => $cart){
                $vn1 = new OrderDetails;
                $vn1->product_price = $cart['product_price'];
                $vn1->product_sales_quantity = $cart['product_qty'];
                $subtotal = $cart['product_price'] * $cart['product_qty'];
                $total = $total + $subtotal; 
                // dd($hai);
            }
        }

        if(Session::get('coupon')){
            foreach(Session::get('coupon') as $key => $cou){
                if($cou['coupon_condition'] == 0){
                    $sale_coupon = ($total*$cou['coupon_number'])/100;
                    $real_coupon += $sale_coupon;
                }else{
                    $sale_coupon = $total - $cou['coupon_number'];
                    $real_coupon += $sale_coupon; 
                }
            }
        }
        
        if(Session::get('fee')){
            $total_after_fee = $total + Session::get('fee');
            $real_coupon2 += $total_after_fee; 
        }
        
        if (Session::get('coupon') && !Session::get('fee')){
            $total1 += $real_coupon;
        }elseif(!Session::get('coupon') && Session::get('fee')){
            $total1 += $real_coupon2;
        }elseif(Session::get('coupon') && Session::get('fee')){
            $CouponAndFee = $real_coupon + Session::get('fee');
            $total1 += $CouponAndFee;
        }elseif(!Session::get('coupon') && !Session::get('fee')){
            $total1 += $total;
        }

        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "BI10ZOG5"; //Mã website tại VNPAY 
        $vnp_HashSecret = "POEKWTBFEVJHFUAZSXKSMCRLQJISLDCI"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://quangthong1604.com/FinalProject/public/payment";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total1;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        Session::forget('coupon');
        Session::forget('cart');
        Session::forget('fee');
        return redirect($vnp_Url)->with('message','Successful confirmation of VNPAY payment gateway transaction!');
    }
}
