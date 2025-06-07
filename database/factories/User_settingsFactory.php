<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class User_settingsFactory extends Factory
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
            'email_notifications' => $this->faker->boolean(),
            'push_notifications' => $this->faker->boolean(),
            'theme' => $this->faker->randomElement(['light', 'dark']),
            'settings' => json_encode([
                'language' => $this->faker->randomElement(['en', 'fr', 'es']),
                'timezone' => $this->faker->timezone,
            ]),
        ];
    }
}
