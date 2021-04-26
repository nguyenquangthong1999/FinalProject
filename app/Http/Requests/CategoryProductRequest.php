<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        // cái này dùng để kiểm tra dữ liệu từ form đẩy lên ó hợp lệ ko, 
        // nên dùng request cho mỗi form, ko được sài reques mặc định vì lở ngta nhập tầm bậy lên là taong
        // vd bên dưới là tên bắt buộc nhập
        return [
            'category_name' => 'required',
            'category_desc' => 'required',
        ];
    }
}
