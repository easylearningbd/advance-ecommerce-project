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
                'adminuserrole' => 1,
                'alluser' => 1,
                'blog' => 1,
                'brand' => 1,
                'category' => 1,
                'coupons' => 1,
                'email' => 'admin@shop.com',
                'email_verified_at' => '2021-10-10 00:00:00',
                'orders' => 1,
                'phone' => '1',
                'product' => 1,
                'profile_photo_path' => 'upload/admin_images/1708281163402686.jpg',
                'reports' => 1,
                'returnorder' => 1,
                'review' => 1,
                'setting' => 1,
                'shipping' => 1,
                'slider' => 1,
                'stock' => 1,
                'type' => '2',
                'created_at' => '2021-08-16 19:57:50',
                'updated_at' => '2021-08-16 19:57:50',
            ),
        ));
        
        
    }
}