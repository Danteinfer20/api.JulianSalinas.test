<?php

namespace Database\Seeders;

use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    public function run(): void
    {
        $data = ['Tecnólogo en ADSO', 'Ingeniero de Sistemas', 'Especialista en Cloud'];

        foreach ($data as $item) {
            Title::create(['nombre_titulo' => $item]);
        }
    }
}