<?php

namespace Database\Factories;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscription>
 */
class InscriptionFactory extends Factory
{
    protected $model = Inscription::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'proof' => fake()->name(),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'event_id' => function () {
                return \App\Models\Event::factory()->create()->id;
            },
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
