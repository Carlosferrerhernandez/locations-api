<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    protected $model = \App\Models\Location::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word(),
            'name' => $this->faker->company(),
            'image' => $this->faker->imageUrl(150, 150, 'business', true),
            'creation_date' => $this->faker->date(),
        ];
    }
}
