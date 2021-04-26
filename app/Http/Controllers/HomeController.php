<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    public function nothing1(){
        $categorys = DB::table('category_product')->orderBy('category_id','DESC')->get();
        $brands = DB::table('brand')->orderBy('brand_id','DESC')->get();
        // lay tat ca gia tri ben trong 2 bảng category_product và brand dựa theo id giảm dần desc
        $a_product = DB::table('product')->orderBy('product_id','DESC')->limit(6)->get();
        // show ra 6 san pham o trang home
    	return view('page.home',compact('categorys','brands','a_product'));
    }

    public function nothing(){
        $categorys = DB::table('category_product')->orderBy('category_id','DESC')->get();
        $brands = DB::table('brand')->orderBy('brand_id','DESC')->get();
        $a_product = DB::table('product')->orderBy('product_id','DESC')->limit(6)->get();
    	return view('page.home',compact('categorys','brands','a_product'));
    }
    
    public function showCategoryItem($category_id){
        $categorys = DB::table('category_product')->orderBy('category_id','DESC')->get();
        $brands = DB::table('brand')->orderBy('brand_id','DESC')->get();

        $getCategoryItem = DB::table('product')
		->join('category_product','category_product.category_id','=','product.category_id')
		->where('category_product.category_id',$category_id)->get();
        return view('page.category_page',compact('categorys','brands','getCategoryItem'));
    }

    public function showBrandItem($brand_id){
        $categorys = DB::table('category_product')->orderBy('category_id','DESC')->get();
        $brands = DB::table('brand')->orderBy('brand_id','DESC')->get();

        $getBrandItem = DB::table('product')
		->join('brand','brand.brand_id','=','product.brand_id')
		->where('brand.brand_id',$brand_id)->get();
        return view('page.brand_page',compact('categorys','brands','getBrandItem'));
    }

    public function showDetailProduct($product_id){
        $categorys = DB::table('category_product')->orderBy('category_id','DESC')->get();
        $brands = DB::table('brand')->orderBy('brand_id','DESC')->get();

        $getDetail = DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
		->join('brand','brand.brand_id','=','product.brand_id') 
        ->where('product_id',$product_id)->get();

        foreach($getDetail as $detail){
            $category_id = $detail->category_id;
        }

        $getRelate = DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id') 
        ->where('category_product.category_id',$category_id)->whereNotIn('product.product_id',[$product_id])->get();

        return view('page.product_detail',compact('categorys','brands','getDetail','getRelate'));
    }
}
