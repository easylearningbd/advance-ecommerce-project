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
                'adminuserrole' => 1,
                'alluser' => 1,
                'blog' => 1,
                'brand' => 1,
                'category' => 1,
                'coupons' => 1,
                'created_at' => '2021-08-16 19:57:50',
                'current_team_id' => 1,
                'email' => 'admin@shop.com',
                'email_verified_at' => '2021-10-10 00:00:00',
                'id' => 2,
                'name' => 'admin',
                'orders' => 1,
                'password' => '$2y$10$ImjoHE8fN3QUrfWbRtCiauvZV1nz0DJj3daDkZJ8cJOxHpAMTGWTG',
                'phone' => '1',
                'product' => 1,
                'profile_photo_path' => 'storage/upload/admin_images/1708281163402686.jpg',
                'remember_token' => '1XqHClt3b8QWlbD2dl1goV72KPQZEeeTnNEC1wzYFr0jUgoiOuxJ8Rr5M7Db',
                'reports' => 1,
                'returnorder' => 1,
                'review' => 1,
                'setting' => 1,
                'shipping' => 1,
                'slider' => 1,
                'stock' => 1,
                'type' => '2',
                'updated_at' => '2021-08-16 19:57:50',
            ),
        ));


    }
}
