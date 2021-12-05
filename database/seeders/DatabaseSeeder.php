<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\Admin::factory()->create();
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(SubSubCategoriesTableSeeder::class);
        $this->call(ShipStatesTableSeeder::class);
        $this->call(BlogPostCategoriesTableSeeder::class);
        $this->call(BlogPostsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(MultiImgsTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(SeosTableSeeder::class);
        $this->call(ShipDistrictsTableSeeder::class);
        $this->call(ShipDivisionsTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(WishlistsTableSeeder::class);
    }
}
