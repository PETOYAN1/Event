<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
            'status' => $this->faker->randomElement(['moderation', 'published', 'closed']),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->address(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'duration' => $this->faker->numberBetween(1, 24),
            'duration_unit' => $this->faker->randomElement(['minutes', 'hours', 'days']),
        ];
    }
}
