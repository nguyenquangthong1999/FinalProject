<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'quanhuyen'; //ten bang db
    protected $primaryKey = 'maqh';
    protected $fillable = ['name','type','matp'];
}
