<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'tinhthanhpho'; //ten bang db
    protected $primaryKey = 'matp';
    protected $fillable = ['name','type'];
}
