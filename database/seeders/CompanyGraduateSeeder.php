<?php

namespace Database\Seeders;

use App\Models\CompanyGraduate;
use App\Models\Graduate;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyGraduateSeeder extends Seeder
{
    public function run(): void
    {
        $graduates = Graduate::all();
        $company = Company::first();

        $statuses = ['Contratado', 'En Proceso', 'Pasante'];
        $roles = ['Junior Developer', 'Data Analyst', 'QA Engineer'];

        foreach ($graduates as $index => $graduate) {
            CompanyGraduate::create([
                'estado_actual' => $statuses[$index],
                'cargo' => $roles[$index],
                'graduate_id' => $graduate->id,
                'company_id' => $company->id
            ]);
        }
    }
}