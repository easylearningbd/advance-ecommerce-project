<?php

namespace App\Models;

use BFilters\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use HasFilter;


    protected array $fillable = [
        'brand_name_en',
        'brand_name_hin',
        'brand_slug_en',
        'brand_slug_hin',
        'brand_image',
    ];

}
