<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inscription;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class InscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Inscription::class;

    public function definition()
    {
        return [
            'proof' => $this->faker->name(),
            'user_id' => User::factory(),
            'event_id' => Event::factory(),
            'status' => $this->faker->randomElement(['approved', 'pending', 'rejected']),
        ];
    }
}
