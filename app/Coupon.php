<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Coupon;
class Coupon extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'coupon_id';
    protected $table = 'coupon';
    protected $fillable = ['coupon_name','coupon_code','coupon_time','coupon_condition','coupon_number'];
}
