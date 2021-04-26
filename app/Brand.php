<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand'; //ten bang db
    protected $primaryKey = 'brand_id';
    protected $fillable = ['brand_name','brand_desc','brand_status'];
}
