<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $primaryKey = 'order_details_id';
    protected $table = 'tbl_order_details';
    protected $fillable = ['order_code','product_id','product_name','product_price','product_sales_quantity','product_coupon','product_feeship'];
    
    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
