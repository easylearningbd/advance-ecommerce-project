<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShipStatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ship_states')->delete();
        
        \DB::table('ship_states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'division_id' => 1,
                'district_id' => 1,
                'state_name' => 'tehran',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'division_id' => 1,
                'district_id' => 2,
                'state_name' => 'qom',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}