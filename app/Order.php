<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';
    protected $fillable = ['customer_id','shipping_id','order_status','order_code','created_at'];

}
