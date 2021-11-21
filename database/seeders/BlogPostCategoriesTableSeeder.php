<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogPostCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_post_categories')->delete();
        
        \DB::table('blog_post_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'blog_category_name_en' => 'technology',
                'blog_category_name_hin' => 'تکنولوژی',
                'blog_category_slug_en' => 'technology',
                'blog_category_slug_hin' => 'تکنولوژی',
                'created_at' => '2021-08-16 19:24:55',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}