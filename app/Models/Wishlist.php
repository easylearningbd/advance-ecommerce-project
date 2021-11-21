<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    use HasFilter;


    protected $guarded = [];

  public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }


}
