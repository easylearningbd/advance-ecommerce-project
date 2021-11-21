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
                'phone' => '234234234',
                'last_seen' => '2021-08-06 11:22:17',
                'email_verified_at' => '2020-10-03 17:15:51',
                'password' => '$2y$10$xyCE4B8/8hP1AUOxAOi0UeatitPS.tCYoeAUYCAp2i2',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '3oxfjS2YIeprjGPvybeQsdQuS3eRx60FzolCr41Q29',
                'current_team_id' => NULL,
                'profile_photo_path' => 'profile-photos/2rezIJSuH6cqoUnHYY2JtR.jpeg',
                'created_at' => '2020-09-29 16:36:16',
                'updated_at' => '2020-10-07 19:04:24',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ariyan',
                'email' => 'ariyan@gmail.com',
                'phone' => '234234234',
                'last_seen' => '2021-08-06 11:22:17',
                'email_verified_at' => '2020-10-03 17:15:51',
                'password' => '$2y$10$fiRVWisNmENZGAQhX2NP.8Qnykba6axlouxbXtS',
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
                'phone' => '234234234',
                'last_seen' => '2021-08-06 11:22:17',
                'email_verified_at' => '2020-10-03 17:15:51',
                'password' => '$2y$10$al.9Izs0ZxjxGAiLNjFPu.btvETNS8gJN2cVZowJclbWGw6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2020-09-29 17:23:42',
                'updated_at' => '2020-09-29 17:23:42',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'saber',
                'email' => 'saber@saber.com',
                'phone' => '234234234',
                'last_seen' => '2021-08-06 11:22:17',
                'email_verified_at' => '2020-10-03 17:15:51',
                'password' => '$2y$10$Ry4YCzWhWtCyfOuMWBjbPBtZZ5NscYmiDvIT8NNNW',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-08-06 11:02:34',
                'updated_at' => '2021-08-06 11:22:17',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'صابر طباطبائییزدی',
                'email' => 'Saber.tabatabaee@gmail.com',
                'phone' => '234234234',
                'last_seen' => '2021-08-16 12:00:48',
                'email_verified_at' => '2020-10-03 17:15:51',
                'password' => '$2y$10$ImjoHE8fN3QUrJj3daDkZJ8cJOxHpAMTGWTG',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => '202108160926saber_ax_personnely_jikjik.jpg',
                'created_at' => '2021-08-16 09:25:14',
                'updated_at' => '2021-08-16 12:00:48',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'صابر طباطبائییزدی',
                'email' => 'saber.tabataba@gmail.com',
                'phone' => '09196070718',
                'last_seen' => '2021-08-16 19:09:35',
                'email_verified_at' => NULL,
                'password' => '$2y$10$EdW1CQ4O5baJsO3x..1Sc1L54U.enWDUF6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-08-16 12:20:06',
                'updated_at' => '2021-08-16 19:09:35',
            ),
        ));
        
        
    }
}