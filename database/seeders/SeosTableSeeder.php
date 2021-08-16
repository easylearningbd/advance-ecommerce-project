<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seos')->delete();
        
        \DB::table('seos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'meta_title' => 'فروشگاه',
                'meta_author' => 'صابر',
                'meta_keyword' => 'فروشگاه',
                'meta_description' => 'فروشگاه اینترنتی',
                'google_analytics' => '2342342',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}