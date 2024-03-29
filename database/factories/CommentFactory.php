<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $date = fake()->dateTimeBetween('-10 years', 'now');

        return [
            'comment' => fake()->sentences(rand(1, 6), true),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }

    public function existing() {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => $this->faker->numberBetween(1, 250)
            ];
        });
    }
}
