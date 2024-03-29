<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $title = fake()->randomElement(['Add', 'Fix', 'Improve']).' '.implode(' ', fake()->words(rand(2, 5)));

        return [
            'title' => $title,
            'status' => fake()->randomElement([
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Approved',
                'Completed',
                'Completed',
            ]),
        ];
    }
}
