<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'admin_id';
    protected $table = 'admin';
    protected $fillable = ['admin_email','admin_password','admin_name','admin_phone'];
}
