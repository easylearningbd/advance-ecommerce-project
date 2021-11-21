<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_categories')->delete();
        
        \DB::table('sub_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'subcategory_name_en' => 'ghezel',
                'subcategory_name_hin' => 'قزل آلا',
                'subcategory_slug_en' => 'ghezel',
                'subcategory_slug_hin' => 'شسیب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'subcategory_name_en' => 'adsfa',
                'subcategory_name_hin' => 'دوم',
                'subcategory_slug_en' => 'adsfads',
                'subcategory_slug_hin' => 'شیسب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 2,
                'subcategory_name_en' => 'asdfasdf',
                'subcategory_name_hin' => 'سوم',
                'subcategory_slug_en' => 'adsf',
                'subcategory_slug_hin' => 'شسیب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 3,
                'subcategory_name_en' => 'asdf3',
                'subcategory_name_hin' => 'چهارم',
                'subcategory_slug_en' => 'asdf',
                'subcategory_slug_hin' => 'شسیب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 4,
                'subcategory_name_en' => 'adsf',
                'subcategory_name_hin' => 'پنجم',
                'subcategory_slug_en' => 'adf',
                'subcategory_slug_hin' => 'شسیب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 5,
                'subcategory_name_en' => 'adsf7',
                'subcategory_name_hin' => 'ششم',
                'subcategory_slug_en' => 'asdf',
                'subcategory_slug_hin' => 'شسیب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 6,
                'subcategory_name_en' => 'adsf7',
                'subcategory_name_hin' => 'هفتم',
                'subcategory_slug_en' => 'asdf',
                'subcategory_slug_hin' => 'شیب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 7,
                'subcategory_name_en' => 'adsf7',
                'subcategory_name_hin' => 'هشتم',
                'subcategory_slug_en' => 'adsf',
                'subcategory_slug_hin' => 'شسی',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 8,
                'subcategory_name_en' => 'adsf8',
                'subcategory_name_hin' => 'نهم',
                'subcategory_slug_en' => 'adsf',
                'subcategory_slug_hin' => 'شیسب',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}