<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubSubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_sub_categories')->delete();
        
        \DB::table('sub_sub_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'subcategory_id' => 1,
                'subsubcategory_name_en' => 'fish2',
                'subsubcategory_name_hin' => 'ماهی',
                'subsubcategory_slug_en' => 'fish',
                'subsubcategory_slug_hin' => 'ماهی',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 2,
                'subcategory_id' => 2,
                'subsubcategory_name_en' => 'sdfs',
                'subsubcategory_name_hin' => 'ماهی2',
                'subsubcategory_slug_en' => 'fish2',
                'subsubcategory_slug_hin' => 'ماهی2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}