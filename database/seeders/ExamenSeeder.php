<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('examens')->insert([
            'code_module' => 'M204',
            'titre_module' => 'Développement front-end',
            'filiere' => 'DEVOWFS',
            'type' => 'théorique',
            'duree' => 120,
            'date_examen' => '2025-06-01'
        ]);

        DB::table('examens')->insert([
            'code_module' => 'M204',
            'titre_module' => 'Développement front-end',
            'filiere' => 'DEVOWFS',
            'type' => 'pratique',
            'duree' => 150,
            'date_examen' => '2025-06-15'
        ]);;
    }
}
