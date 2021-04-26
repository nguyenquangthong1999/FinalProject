<?php

namespace App\Http\Controllers;
use App\CategoryProduct;
use App\Http\Requests\CategoryProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Category extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // @return \Illuminate\Http\Response
        $data = CategoryProduct::all();
        return view('admin.CategoryProduct.all_category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showHandleForm1()
    {
        return view('admin.CategoryProduct.add_category');
    }

    public function createHandleForm1(CategoryProductRequest $request)
    {
       CategoryProduct::create($request->all());
       return Redirect()->route('ALL_CATE')->with('message','Add New Category Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $categoryProduct = CategoryProduct::findOrFail($category_id);

        return view('admin.CategoryProduct.update_category', compact('categoryProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryProductRequest $request, $category_id)
    {
        // get Object tu datatabase
       $entity = CategoryProduct::findOrFail($category_id);
       // update object vao database lai
       $entity->update($request->all());

       return redirect()->route('ALL_CATE')->with('message', 'Update Category Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyHandleForm4($category_id)
    {
         CategoryProduct::find($category_id)->delete();
         return redirect()->route('ALL_CATE')->with('message','Delete Category Successfully!');
    }
}

 // tạo controller nên thêm -r vô rồi dùng luôn các hàm của nó suggest sẵn
 // nhớ nhìn các comment params với return để biết nó dùng như nào


// Hàm index luôn là trang list danh sách ra
// Hàm show là show 1 sản phẩm ra, hiên tại mi chưa có trang show nên k dung, đừng dùng lung tung
// Hàm create -> show form create
// Hàm store -> dùng để taoj mới product

// hàm edit dùng show form edit (nhớ kèm theo object muốn edit)
// update -> update product ( tìm object đó từ db ra  ngoài xong mới update)
// return luôn dùng redirect()->route()  ( trong route() là tên của route() )

// Route::get('all_category_product','ProductTest@index')->name('ten_route') tên route name('ten_route') để gọi cho gọn

// ok chưa, nên đặt tên route cho dễ nhớ với đặt tên url cho đúng
// nên dùng Route::resource('tên_route', 'tên controller')
// -> Route::resource('products', 'ProductTest');
// route('products.index') -> tự map với ProductTest@index
// tương tự mấy cái kia, để khỏi phải khai báo nhiều route

// ok cái route với update chưa ? ok roi do :v tắt đây ngủ đã bun ngủ qá t cx vay ahahah