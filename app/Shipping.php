<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'shipping_id';
    protected $table = 'shipping';
    protected $fillable = ['shipping_name','shipping_note','shipping_method','shipping_address','shipping_phone','shipping_email'];
}
