<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasFilter;

    protected $guarded = [];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    	return $this->belongsTo(Category::class,'category_id','id');
    }


    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }



}
