<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
 public function run(): void
 {
 $this->call([
 CountrySeeder::class,
 StateSeeder::class,
 CitySeeder::class,
 CompanySeeder::class,
 AreaKnowledgeSeeder::class,
 TitleSeeder::class,
 GraduateSeeder::class,
 CompanyGraduateSeeder::class,
 AreaGraduateSeeder::class,
 ]);
 }
}