<?php

namespace Database\Factories;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'meta_title' => $this->faker->name,
            'meta_author' => $this->faker->name,
            'meta_keyword' => $this->faker->name,
            'meta_description' => $this->faker->name,
            'google_analytics' => $this->faker->name,
        ];
    }
}
