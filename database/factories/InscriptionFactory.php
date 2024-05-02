<?php

namespace Database\Factories;

use App\Models\Inscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
