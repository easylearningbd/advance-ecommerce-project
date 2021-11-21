<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_posts')->delete();
        
        \DB::table('blog_posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'post_title_en' => 'Technology',
                'post_title_hin' => 'تکنولوژی',
                'post_slug_en' => 'technology',
                'post_slug_hin' => 'تکنولوژی',
                'post_image' => 'upload/post/1708279139544575.jpg',
                'post_details_en' => '<p>Post Details English</p>',
                'post_details_hin' => '<p>Post Details Hindi</p>',
                'created_at' => '2021-08-16 19:25:40',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}