<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShipDistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ship_districts')->delete();
        
        \DB::table('ship_districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'division_id' => 1,
                'district_name' => 'tehran',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'division_id' => 1,
                'district_name' => 'qom',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}