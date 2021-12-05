<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'brand_name_en' => 'Apple',
                'brand_name_hin' => 'سیب',
                'brand_slug_en' => 'apple',
                'brand_slug_hin' => 'سیب',
                'brand_image' => 'upload/brand/1708281442402207.jpg',
                'created_at' => '2020-10-01 17:57:16',
                'updated_at' => '2021-08-16 20:02:16',
            ),
            1 => 
            array (
                'id' => 2,
                'brand_name_en' => 'Gucci1',
                'brand_name_hin' => '',
                'brand_slug_en' => '',
                'brand_slug_hin' => '',
                'brand_image' => 'image/brand/1679385587525168.png',
                'created_at' => '2020-10-01 17:59:01',
                'updated_at' => '2020-10-01 18:45:02',
            ),
            2 => 
            array (
                'id' => 4,
                'brand_name_en' => 'Nokia',
                'brand_name_hin' => '',
                'brand_slug_en' => '',
                'brand_slug_hin' => '',
                'brand_image' => 'image/brand/1679553481876182.png',
                'created_at' => '2020-10-03 15:13:38',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'brand_name_en' => 'Apple NEW3',
                'brand_name_hin' => '',
                'brand_slug_en' => '',
                'brand_slug_hin' => '',
                'brand_image' => 'image/brand/1679748893402349.png',
                'created_at' => '2020-10-05 18:59:38',
                'updated_at' => '2020-10-08 17:12:59',
            ),
        ));
        
        
    }
}