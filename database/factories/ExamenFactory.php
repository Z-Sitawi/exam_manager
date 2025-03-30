<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\examen>
 */
class ExamenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $modules = [
            "Préparation d’un projet web",
            "Approche agile",
            "Gestion des données",
            "Développement front-end",
            "Développement back-end",
            "Création d’une application Cloud native",
            "Projet de synthèse"
        ];

        return [
            'code_module' => 'M' . fake()->numberBetween(200, 299),
            'titre_module' => fake()->randomElement($modules),
            'filiere' => 'DEFVOWFS',
            'type' => fake()->randomElement(['théorique', 'pratique', 'synthèse']),
            'duree' => fake()->randomElement([30, 60, 90, 120, 150]),
            'date_examen' => fake()->dateTimeBetween('tomorrow', '+10 months')->format('Y-m-d')
        ];
    }
}
