<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Administrator;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Administrator>
 */
class AdministratorFactory extends Factory
{
    protected $model = Administrator::class;
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
            'date_birthday' =>  fake()->date(),
            'cpf' => '006.075.049-94',
            'password' => fake()->password()
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Administrator $administrator) {
    //         $administrator->address()->save(Address::factory()->make());
    //         $administrator->permission()->save(Permission::factory()->make());
    //     });
    // }
}
