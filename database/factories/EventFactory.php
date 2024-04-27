<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => fake()->name(),
            'description' => fake()->text(100),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'modality' => fake()->randomElement(['Presential', 'Hybrid', 'Remote']),
            'status' => fake()->randomElement(['Active', 'Inactive', 'Pending']),
            'type' => fake()->randomElement(['Course', 'Workshop', 'Lecture']),
            'target_audience' => fake()->name(),
            'vacancies' => fake()->numberBetween(0, 50),
            'social_vacancies' => fake()->numberBetween(0, 50),
            'regular_vacancies' => fake()->numberBetween(0, 50),
            'material' => fake()->text(100),
            'interest_area' => fake()->name(),
            'price' => fake()->numberBetween(0, 100)
        ];
    }
    
    /**
     * Define a state for generating invalid data.
     *
     * @return array<string, mixed>
     */
    public function invalid(): array
    {
        return [
            'name' => '', 
            'modality' => 'InvalidModality', 
            'status' => 'InvalidStatus', 
            'type' => 'InvalidType', 
            'vacancies' => 'abc', 
            'social_vacancies' => 'xyz',
            'regular_vacancies' => '123', 
            'interest_area' => 'InvalidInterestArea', 
            'price' => 'abc'
        ];
    }
}
