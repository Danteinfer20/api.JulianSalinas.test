<?php

namespace Database\Seeders;

use App\Models\AreaKnowledge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $data = ['Ingeniería de Software', 'Ciencia de Datos', 'Ciberseguridad'];

        foreach ($data as $item) {
            AreaKnowledge::create(['nombre_area_conocimiento' => $item]);
        }
    }
}