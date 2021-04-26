<?php

namespace App\Http\Controllers;
use App\CategoryProduct;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryProductRequest;


class CategoryProductController extends Controller
{
    // private $data;
    

    // public function all_category_product(){
    // 	$show_category_product = DB::table('category_product')->get();// Lấy tất cả dữ liệu trong bảng category_product
    // 	$manager_category_product = view('admin.all_category_product')->with('show_category_product',$show_category_product);
    // 	return view('adminlayout')->with('admin.all_category_product',$manager_category_product);
    // 	// Ở đây có nghĩa là ta lấy adminlayout làm layout chung và kèm theo đó là nó sẽ show ra tất cả dữ liệu từ $manager_category_product mà ta đã khai báo ở trên
    // }

    // public function save_category_product(CategoryProductRequest $request){

//han check dât đúng điều kiện mới được cho vô
        //vd
    // nhu ri hắn sẽ show ra cái bên dưới
    //    dd('tét đã vào được chưa');
    //     // nãy để lộn bình thường mi ko nhập thấy lỗi ra đúng ko ?
    //     // nó crashapp báo data insert vào k đúng
    //     // nhưng nếu dùng CategoryRequest nó sẽ ko cho vào đây luôn
    //     // nó đứng ở cái bước request
    //     CategoryProduct::create($request->all());
    // 	Session::put('thongbao2','Thêm danh mục sản phẩm thành công');

    // 	return Redirect::to('add-category-product');
    // }

    // public function edit_category_product($category_id){
    //     $edit_category_product = DB::table('category_product')->where('category_id',$category_id)->get();
    //     $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    //     Session::put('thongbao3','Cập nhật sản phẩm thành công');
    //     return view('adminlayout')->with('admin.edit_category_product',$manager_category_product);

    // }

    // public function update_category_product(Request $request,$category_id){
    //     $data = array();
    //     $data['category_name'] = $request->category_product_name;
    //     $data['category_desc'] = $request->category_product_desc;
    //     $data['category_status'] = $request->category_product_status;
    //     DB::table('category_product')->where('category_id',$category_id)->update($data);
    //     Session::put('thongbao3','Cập nhật sản phẩm thành công');
    //     return Redirect::to('all-category-product');
    // }

    // public function edit_category_product(Request $request, $category_id)
    // {
    //     // lẻ ra update phải trỏ tới trang view update rồi mới submit vào đây nề
    //     $data = CategoryProduct::findOrFail($category_id);
    //     $data = $request->all();
    //     $data->save();
    // }
    // public function delete_category_product($category_id){
    //     DB::table('category_product')->where('category_id',$category_id)->delete();
    //     return Redirect::to('all-category-product');
    // }

    // còn nếu udpate thì nên làm như này

    // public function edit($id)
    // {
    //     $entity = CategoryProduct::findOrFail($id);

    //     // cái này là trả về trang edit mà các data sẽ đc fill sẵn vào form
    //     return view('view-edit', compact('entity'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // tìm object muốn update
    //     $entity = CategoryProduct::findOrFail($id);
    //     // update data theo eloquent với request->all() là data từ form
    //     // ->update sẽ mapping với các field đc khai báo trong fillable
    //     $entity->update($request->all())) 
    //         // neu update thanh cong
    //     ?    $msg = 'Cập nhật sản phẩm thành công';
        
    //         // update that bai
    //     :    $msg ='update that bai';
     

    //     // Session::put('thongbao3','Cập nhật sản phẩm thành công');
    //     // cái with thay thế cho cái session. dùng session dài dòng
    //     return redirect()->back()->with('thongbao3', $msg);
    // }

    // public function delete($id)
    // {
    //     // nhanh hon cach dung DB ko :v nhanh vc ra t hieu 2 cai fillable vs guarde roi do hay hay
    //     // ngoai ra cac ham ma DB dung thi eloquent dung tuong tu
    //     // vd
    //     DB::('table_name')->where($condition)->get();
    //     TableName::where($condition)->get();
    //     // con nhiu cai nua 2 cai sai nhu nhau, nhung DB thi toc' do no se nhanh hon
    //     // gio mi lam demo thi k tha no nhanh hay cham nhưng sau này dự án lớn sẽ thấy sự khác biệt
    //     // với lại nên ưu tiên dùng eloquent vì nhanh , DB dùng với những câu truy vấn phức tạp thôi

    //     CategoryProduct::destroy($id);
    //     edirect()->back()->with('thongbao3', 'xoa thanh cong');
    // }
}