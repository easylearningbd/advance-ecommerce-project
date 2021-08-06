<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name_en',
        'category_name_hin',
        'category_slug_en',
        'category_slug_hin',
        'category_icon',
        'user_id',
    ];

}
