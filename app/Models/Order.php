<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
    	return $this->belongsTo(ShipDivision::class,'division_id','id');
    }

      public function district(){
    	return $this->belongsTo(ShipDistrict::class,'district_id','id');
    }

      public function state(){
    	return $this->belongsTo(ShipState::class,'state_id','id');
    }

      public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }

 
}
 