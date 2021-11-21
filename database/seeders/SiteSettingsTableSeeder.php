<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('site_settings')->delete();
        
        \DB::table('site_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'logo' => 'upload/logo/1708279183450497.jpg',
                'phone_one' => '876786',
                'phone_two' => '869768',
                'email' => 'saber@domain.com',
                'company_name' => 'domain',
                'company_address' => 'address',
                'facebook' => 'face',
                'twitter' => 'tiwtter',
                'linkedin' => 'linkedin',
                'youtube' => 'youtube',
                'created_at' => NULL,
                'updated_at' => '2021-08-16 19:26:22',
            ),
        ));
        
        
    }
}