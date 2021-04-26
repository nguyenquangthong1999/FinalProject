<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    public $timestamps = false;
    protected $table = 'fee_ship'; 
    protected $primaryKey = 'fee_id';
    protected $fillable = ['fee_matp','fee_maqh','fee_xaid','fee_ship'];
    public function City(){
        return $this->belongsTo('App\City','fee_matp');
    }
    public function Province(){
        return $this->belongsTo('App\Province','fee_maqh');
    }
    public function Ward(){
        return $this->belongsTo('App\Ward','fee_xaid');
    }
}
