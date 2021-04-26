<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{

	protected $table = 'category_product';
	protected $primaryKey = 'category_id';
    // protected $guarded = ['category_status'];
    protected $fillable = ['category_name', 'category_desc', 'category_status'];
 
 // mà nên dùng fillable
 
    // vd mi đang pót 3 field kia vô db đúng ko ?
    // protected $fillable = [];
    // dùng Eloquent nếu khai báo $guarded thì sẽ ko đc khai báo fillable
    // $fillable => sẽ  nhận tất cả các field được đăng kí
    // vd dùng fillable => dât đảy lên 4 cái/ mà đăng ký tronônǵ 3 cái thì nó sẽ lấy 3 cái

    // $guarded loại bỏ các fill đc đăng kí
    // còn thằng ni đẩy len 4 cái mà đăng kí field n ào thì field đó sẽ ko được đẩy vô DB
}



// 1 : Model -> điền fillable hoặc guarded
// Nếu khóa chính k phải id thì đặt lại primaryKey
// nếu tên bảng ko đúng thì table -> tên bảng phải là số nhiều vd : tên Model là Product thì tên bảng phải là products
// Tạo controller -> tạo view
// create/update cần 1 request để bắt -> php artisan make:request ProductRequest
// ProductRequest -> authorize điền return = true;
// rules = ['tên field' => 'điều kiện pass'];
// vd ['category_name' => 'required|max:10'];
// hoàn tất thì nen dùng return redirect()->route('name_route') //   redirect()->back() quay lại trang trước
// nhớ dùng ->with('tên_session', 'giá trị sesion (thông báo)');

// sơ đồ của 1 form đơn giản là rứa đó ok m de t hoc thuoc long lun

// https://laravel.com/docs/7.x/eloquent#mass-assignment đọc cái này để biết vì răng mà t dùng
// update/create($request->all())

// đó ngồi tập mấy cái form đi , khi mô ok rồi t chỉ cho cái khác xịn hơn :v ok de t lam lai tu dau lun
/// à với lại đặt tên controller method nên chuẩn