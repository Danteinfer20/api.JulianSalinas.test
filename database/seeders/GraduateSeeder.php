<?php

namespace Database\Seeders;

use App\Models\Graduate;
use App\Models\City;
use App\Models\Title;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GraduateSeeder extends Seeder
{
    public function run(): void
    {
        $city = City::first();
        $titles = Title::all();

        $graduates = [
            ['nombre_egresado' => 'Juan Carlos Salinas', 'telefono' => '3124567890', 'correo_electronico' => 'juan@mail.com', 'direccion' => 'popayan'],
            ['nombre_egresado' => 'María Camila Paz', 'telefono' => '3157894561', 'correo_electronico' => 'camila@mail.com', 'direccion' => 'cali'],
            ['nombre_egresado' => 'Andrés Felipe López', 'telefono' => '3189632541', 'correo_electronico' => 'andres@mail.com', 'direccion' => 'cali']
        ];

        foreach ($graduates as $data) {
            $graduate = Graduate::create([
                'nombre_egresado' => $data['nombre_egresado'],
                'telefono' => $data['telefono'],
                'correo_electronico' => $data['correo_electronico'],
                'direccion' => $data['direccion'],
                'city_id' => $city->id
            ]);

            // Llena la tabla pivote graduates_titles usando la relación del modelo
            $graduate->titles()->attach($titles->random()->id);
        }
    }
}