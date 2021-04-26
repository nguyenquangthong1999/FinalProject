<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'xaphuongthitran'; //ten bang db
    protected $primaryKey = 'xaid';
    protected $fillable = ['name','type','maqh'];
}
