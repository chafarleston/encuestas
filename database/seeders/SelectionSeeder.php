<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Selection;
class SelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              Selection::create(['description' => 'Paises','detail' =>'']);
          Selection::create(['description' => 'Perú Regiones','detail' =>'']);
            Selection::create(['description' => 'Perú Departamentos','detail' =>'']);
    }
}
