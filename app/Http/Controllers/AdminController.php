<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;
use App\Login;
use Carbon\Carbon;
use Mail;
Use App\Http\Requests\ResetPWRequest;
use Illuminate\Support\Facades\Hash;
use App\Rules\Captcha;
use Validator;

class AdminController extends Controller
{
	public function dangnhapAdmin(){
		return view ('adminlogin');
	}

	public function show_dashboard1(){
    	return view ('admin.dashboard1');
    }

    public function show_dashboard2(Request $request){
		$data = $request->validate([
			'admin_email' => 'required',
			'admin_password' => 'required',
			'g-recaptcha-response' => new Captcha(),
		]);
    	$admin_email = $data['admin_email'];
    	$admin_password = md5($data['admin_password']);
    	$result = DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    	if($result == true){
    		Session::put('admin_id',$result->admin_id);
    		Session::put('admin_name',$result->admin_name);
    		return view('admin.dashboard1');
			// return view('adminlayout1');
    	}else{
    		// Session::put('thongbao','sai');
    		return Redirect()->route('LOGIN_ADMIN')->with('thongbao','Incorrect username or password!');
		}
	}
	
	public function getFormReset(){
		return view('admin.GetPW.Form');
	}

	public function sendCodeResetPW(Request $request){
		$admin_email = $request->admin_email;
		$checkEmail = Login::where('admin_email',$admin_email)->first();

		if (!$checkEmail){
			return redirect()->back()->with('thongbao9','This email address cannot be found!');
		}

		$code = bcrypt(md5(time().$admin_email));

		$checkEmail->code = $code;
		$checkEmail->time_code = Carbon::now();
		$checkEmail->save();

		$url = route('get.link.resetpw',['code'=>$checkEmail->$code,'admin_email' => $admin_email]);
		$data = ['route' => $url];
		Mail::send('admin.GetPW.directGmail',$data, function($message) use ($admin_email){
	        $message->to($admin_email,'Reset Password')->subject('Lấy lại mật khẩu'); //Subject là title của gmail
		});
		
		return Redirect()->back();
	}

	public function directGmail(Request $request){
		$admin_email = $request->admin_email;
		$code = $request->code;
		// $checkUser = Login::where('admin_email',$admin_email)->first();
		$checkUser = Login::where('code',$code)->orwhere('admin_email',$admin_email)->first();
			// ['code' => $code,
			// 'admin_email' => $admin_email])->first();

		if ($checkUser){
			return view('admin.GetPW.InputPW');
		}
		else{
			return Redirect('/');
		}
		// return Redirect('/')->with('danger','Cut');
		// return view('admin.InputPW');
	}

	public function inputResetPW(ResetPWRequest $request){
		if($request->admin_password){
			$code = $request->code;
			$admin_email = $request->admin_email;
			
			$checkUser = Login::where('code',$code)->orwhere('admin_email',$admin_email)->first();
			if (!$checkUser){
				return Redirect('/')->route();
			}
			$checkUser->admin_password = md5($request->admin_password);
			$checkUser->save();
			return Redirect()->route('LOGIN_ADMIN')->with('thongbao10','Successful password retrieval!');
			// dd($request->all());
			// dd($request->input('admin_password'));
			// $admin_password = md5($request->$admin_password);
			// $resetPW = Login::where('admin_password',$admin_password)->save();
			// return Redirect()->route('loginadmin')->with('thongbao','Lay lai mk tcong');
			// dd($request->all());
			// dd($request->input('admin_password'));
			// dd($request->all());
		}
	}

	public function show123(){
    	return $request->user();
    }
}
