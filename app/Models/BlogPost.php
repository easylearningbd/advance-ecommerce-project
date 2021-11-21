<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog\BlogPostCategory;

class BlogPost extends Model
{
    use HasFactory;
    use HasFilter;

    protected $guarded = [];


     public function category(){
    	return $this->belongsTo(BlogPostCategory::class,'category_id','id');
    }



}
