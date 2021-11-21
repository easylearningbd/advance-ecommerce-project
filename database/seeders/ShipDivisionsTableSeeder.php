<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShipDivisionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ship_divisions')->delete();
        
        \DB::table('ship_divisions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'division_name' => 'tehran',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'division_name' => 'qom',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}