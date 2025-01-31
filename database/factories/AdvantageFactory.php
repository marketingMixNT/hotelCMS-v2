<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Advantage;
use App\Models\CategoryAdvantageBennefits;

class AdvantageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advantage::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'short_desc' => $this->faker->text(),
            'desc' => $this->faker->text(),
            'persons' => $this->faker->numberBetween(-10000, 10000),
            'region' => $this->faker->text(),
            'price' => $this->faker->numberBetween(-10000, 10000),
            'link' => $this->faker->text(),
            'gallery' => $this->faker->text(),
            'category_advantage_bennefits_id' => CategoryAdvantageBennefits::factory(),
        ];
    }
}
