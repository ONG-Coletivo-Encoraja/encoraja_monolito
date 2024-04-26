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
            'name' => '', // Nome vazio (deve falhar na validação)
            'modality' => 'InvalidModality', // Modalidade inválida (deve falhar na validação)
            'status' => 'InvalidStatus', // Status inválido (deve falhar na validação)
            'type' => 'InvalidType', // Tipo inválido (deve falhar na validação)
            'vacancies' => 'abc', // Vagas inválidas (deve falhar na validação)
            'social_vacancies' => 'xyz', // Vagas sociais inválidas (deve falhar na validação)
            'regular_vacancies' => '123', // Vagas regulares inválidas (deve falhar na validação)
            'interest_area' => 'InvalidInterestArea', // Área de interesse inválida (deve falhar na validação)
            'price' => 'abc', // Preço inválido (deve falhar na validação)
            // Adicione outros atributos aqui conforme necessário
        ];
    }
}
