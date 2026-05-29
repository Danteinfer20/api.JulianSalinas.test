<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $data = ['Agrocauca', 'Global Play', 'Teslanet'];

        foreach ($data as $item) {
            Company::create(['nombre_empresa' => $item]);
        }
    }
}