<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_name_en' => 'Sea Fish',
                'category_name_hin' => 'ماهی دریا',
                'category_slug_en' => 'sea_fish',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => '2020-09-29 19:01:35',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'category_name_en' => 'Woman',
                'category_name_hin' => 'خانم',
                'category_slug_en' => '',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => '2020-09-29 19:02:45',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'category_name_en' => 'Man Item',
                'category_name_hin' => 'لوازم مردانه',
                'category_slug_en' => '',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => '2020-09-29 19:02:59',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'category_name_en' => 'Fish',
                'category_name_hin' => 'ماهی',
                'category_slug_en' => '',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => '2020-09-29 19:05:37',
                'updated_at' => '2020-09-29 19:05:37',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'category_name_en' => 'hello1',
                'category_name_hin' => 'سلام',
                'category_slug_en' => '',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => '2020-09-29 19:14:00',
                'updated_at' => '2020-10-01 16:26:24',
                'deleted_at' => '2020-10-01 16:26:24',
            ),
            5 => 
            array (
                'id' => 7,
                'category_name_en' => 'Car',
                'category_name_hin' => 'ماشین',
                'category_slug_en' => '',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'category_name_en' => 'Ariyan',
                'category_name_hin' => 'آرین',
                'category_slug_en' => 'arian',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => '2020-09-29 19:45:35',
                'updated_at' => '2020-10-01 16:26:19',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'category_name_en' => 'Woman222',
                'category_name_hin' => 'زنان222',
                'category_slug_en' => 'woman222',
                'category_slug_hin' => '',
                'category_icon' => '',
                'user_id' => NULL,
                'created_at' => '2020-10-01 16:28:34',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}