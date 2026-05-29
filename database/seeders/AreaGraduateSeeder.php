<?php

namespace Database\Seeders;

use App\Models\AreaGraduate;
use App\Models\Graduate;
use App\Models\AreaKnowledge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaGraduateSeeder extends Seeder
{
    public function run(): void
    {
        $graduates = Graduate::all();
        $areas = AreaKnowledge::all();

        foreach ($graduates as $index => $graduate) {
            AreaGraduate::create([
                'area_knowledge_id' => $areas[$index]->id,
                'graduate_id' => $graduate->id
            ]);
        }
    }
}