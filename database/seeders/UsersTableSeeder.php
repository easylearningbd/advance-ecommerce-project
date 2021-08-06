<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Kazi',
                'email' => 'admin@gmail.com',
                'phone' => NULL,
                'last_seen' => NULL,
                'email_verified_at' => '2020-10-03 17:15:51',
                'password' => '$2y$10$xyCE4B8/8hP1AErp8HNKI.bUOxAOi0UeatitPS.tCYoeAUYCAp2i2',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '3oxfjS2YIeprjGPvMMYEZP8bTJIK3fxXQRybeQsdQuS3eRx60FzolCr41Q29',
                'current_team_id' => NULL,
                'profile_photo_path' => 'profile-photos/2GBvHch2s86UntQ1RyPrezIJSuH6cqoUnHYY2JtR.jpeg',
                'created_at' => '2020-09-29 16:36:16',
                'updated_at' => '2020-10-07 19:04:24',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ariyan',
                'email' => 'ariyan@gmail.com',
                'phone' => NULL,
                'last_seen' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$fiRVWisNmENZGAQhX2NPpeVe15dC8IZ4Cj.8Qnykba6axlouxbXtS',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-09-29 16:50:25',
                'updated_at' => '2020-09-29 16:50:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Test',
                'email' => 'test@gmail.com',
                'phone' => NULL,
                'last_seen' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$al.9Izs0ZxjxGAiLNjFPu.K9R8K/btvETNS8gJN2cVZowJclbWGw6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-09-29 17:23:42',
                'updated_at' => '2020-09-29 17:23:42',
            ),
        ));
        
        
    }
}