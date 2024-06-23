<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\BeneficiaryStudent;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BeneficiaryStudent>
 */
class BeneficiaryFactory extends Factory
{
    protected $model = BeneficiaryStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password(),
            'cpf' => '006.075.049-94',
            'date_birthday' =>  fake()->date()
        ];
    }
}
