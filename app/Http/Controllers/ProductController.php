<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function add_product(){
    	$categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
    	$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
    	return view('admin.Product.add_product', compact('categorys','brands'));
    }

    public function addproduct(ProductRequest $request){
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['category_id'] = $request->cate;
    	$data['brand_id'] = $request->brand;
		$image = $request->file('product_image');

		if($image){
			$image = $request->file('product_image');
			$get_name_image = $image->getClientOriginalName(); // lấy tên hình ảnh
			$image->move('public/uploads',$get_name_image);
			$data['product_image'] = $get_name_image;
			DB::table('product')->insert($data);
			// dd($data);
			return Redirect()->route('ALL_PRODUCT')->with('message','Add New Product Successfully!');
		}
		$data['product_image'] = '';
    	DB::table('product')->insert($data);
		// dd($data);
    	return Redirect()->route('ALL_PRODUCT')->with('message','Add New Product Successfully!');
	}
	
	public function all_product(){
		$all_product = DB::table('product')
		->join('category_product','category_product.category_id','=','product.category_id')
		->join('brand','brand.brand_id','=','product.brand_id')->get();
		return view('admin.Product.all_product',compact('all_product'));
	}

	
	public function update_product($product_id){
		$categorys = DB::table('category_product')->orderBy('category_id','desc')->get();
		$brands = DB::table('brand')->orderBy('brand_id','desc')->get();
		$edit_product = DB::table('product')->where('product_id',$product_id)->get();
		return view('admin.Product.update_product',compact('categorys','brands','edit_product'));
	}

	public function updateproduct(ProductRequest $request,$product_id){
		$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['category_id'] = $request->cate;
    	$data['brand_id'] = $request->brand;
		$image = $request->file('product_image');

		if($image){
			$image = $request->file('product_image');
			$get_name_image = $image->getClientOriginalName(); // lấy tên hình ảnh
			// $new_image = $get_name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
			$image->move('public/uploads',$get_name_image);
			$data['product_image'] = $get_name_image;
			DB::table('product')->where('product_id',$product_id)->update($data);
			return Redirect()->route('ALL_PRODUCT')->with('message','Update Product Successfully!');
		}
		
    	DB::table('product')->where('product_id',$product_id)->update($data);
		return Redirect()->route('ALL_PRODUCT')->with('message','Update Product Successfully!');
	}

	public function delete_product($product_id){
		DB::table('product')->where('product_id',$product_id)->delete();
		// return view('admin.Product.all_product')->with('thongbao17','Xóa sản phẩm thành công'); chạy hàm ni sẽ bị lỗi vì 3 hàm delete, update, store ko được return view, nó sẽ báo lỗi Undefined Variable, phải dùng reddirect->route
		return Redirect()->route('ALL_PRODUCT')->with('message','Delete Product Successfully!');
	}


}
