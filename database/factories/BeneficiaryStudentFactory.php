<?php

namespace Database\Factories;

use App\Models\BeneficiaryStudent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BeneficiaryStudent>
 */
class BeneficiaryStudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
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
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'cpf' => fake()->numerify('###.###.###-##'),
            'date_birthday' =>  fake()->date(),
            'image_term' => true,
            'data_term' => true,
        ];
    }
}
