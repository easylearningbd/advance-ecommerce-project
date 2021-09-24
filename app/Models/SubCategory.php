<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    use HasFilter;


    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_hin',
        'subcategory_slug_en',
        'subcategory_name_hin',
    ];

    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }


}
