<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sliders')->delete();
        
        \DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 2,
                'slider_img' => 'image/slider/1679752692652906.png',
                'title' => 'Slider Image name one',
                'description' => 'Slider Image name one Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem',
                'status' => 1,
                'created_at' => '2020-10-05 20:00:01',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'slider_img' => 'image/slider/1679753012140047.png',
                'title' => 'Slider Image name Two',
                'description' => 'Slider Image name Two Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem',
                'status' => 1,
                'created_at' => '2020-10-05 20:05:06',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'slider_img' => 'image/slider/1679753547700856.png',
                'title' => 'Slider Image name Three',
                'description' => 'Slider Image name Three lider Image name one Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea volup',
                'status' => 1,
                'created_at' => '2020-10-05 20:13:37',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}