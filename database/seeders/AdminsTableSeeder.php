<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => '2021-10-10 00:00:00',
                'password' => '$2y$10$Ry4YCzWhWtCyfO..fdWX.uMWBjbkB58tPBtZZ5NscYmiDvIT8NNNW',
                'remember_token' => '3oxfjS2YIeprjGPvMMYEZP8bTJIK3fxXQRybeQsdQuS3eRx60FzolCr41Q29',
                'current_team_id' => 1,
                'profile_photo_path' => 'saber.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}