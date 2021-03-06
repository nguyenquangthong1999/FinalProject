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

 // t???o controller n??n th??m -r v?? r???i d??ng lu??n c??c h??m c???a n?? suggest s???n
 // nh??? nh??n c??c comment params v???i return ????? bi???t n?? d??ng nh?? n??o


// Ha??m index lu??n la?? trang list danh sa??ch ra
// Ha??m show la?? show 1 sa??n ph????m ra, hi??n ta??i mi ch??a co?? trang show n??n k dung, ??????ng du??ng lung tung
// Ha??m create -> show form create
// Ha??m store -> du??ng ?????? taoj m????i product

// ha??m edit du??ng show form edit (nh???? ke??m theo object mu????n edit)
// update -> update product ( ti??m object ??o?? t???? db ra  ngoa??i xong m????i update)
// return lu??n du??ng redirect()->route()  ( trong route() la?? t??n cu??a route() )

// Route::get('all_category_product','ProductTest@index')->name('ten_route') t??n route name('ten_route') ?????? go??i cho go??n

// ok ch??a, n??n ?????t t??n route cho d??? nh??? v???i ?????t t??n url cho ????ng
// n??n d??ng Route::resource('t??n_route', 't??n controller')
// -> Route::resource('products', 'ProductTest');
// route('products.index') -> t???? map v????i ProductTest@index
// t????ng t???? m????y ca??i kia, ?????? kho??i pha??i khai ba??o nhi????u route

// ok ca??i route v????i update ch??a ? ok roi do :v t????t ????y ngu?? ??a?? bun ngu?? qa?? t cx vay ahahah