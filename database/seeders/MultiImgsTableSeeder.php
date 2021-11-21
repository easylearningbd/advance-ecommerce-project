<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MultiImgsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('multi_imgs')->delete();
        
        \DB::table('multi_imgs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 2,
                'photo_name' => 'upload/products/multi-image/1708276126195274.jpg',
                'created_at' => '2021-08-16 18:37:47',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 2,
                'photo_name' => 'upload/products/multi-image/1708276126556012.jpg',
                'created_at' => '2021-08-16 18:37:47',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}