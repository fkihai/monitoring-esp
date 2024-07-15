<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Monitoring>
 */
class MonitoringFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'temp' => $faker->randomFloat(2, 0, 100),
            'hum' => $faker->numberBetween(0, 100),
            'nh3' => $faker->numberBetween(0, 100),
            'fan1' => $this->faker->boolean(),
            'fan2' => $this->faker->boolean(),
            'fan3' => $this->faker->boolean(),
            'fan4' => $this->faker->boolean(),
        ];
    }
}
