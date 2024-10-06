<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create([
            'nombre' => 'PRIMER GRADO',
            'nivel' => 1
        ]);
        Grade::create([
            'nombre' => 'SEGUNDO GRADO',
            'nivel' => 1
        ]);
        Grade::create([
            'nombre' => 'TERCER GRADO',
            'nivel' => 1
        ]);
        Grade::create([
            'nombre' => 'CUARTO GRADO',
            'nivel' => 1
        ]);
        Grade::create([
            'nombre' => 'QUINTO GRADO',
            'nivel' => 1
        ]);
        Grade::create([
            'nombre' => 'SEXTO GRADO',
            'nivel' => 1
        ]);
        Grade::create([
            'nombre' => 'PRIMER AÑO',
            'nivel' => 2
        ]);
        Grade::create([
            'nombre' => 'SEGUNDO AÑO',
            'nivel' => 2
        ]);
        Grade::create([
            'nombre' => 'TERCER AÑO',
            'nivel' => 2
        ]);
        Grade::create([
            'nombre' => 'CUARTO AÑO',
            'nivel' => 2
        ]);
        Grade::create([
            'nombre' => 'QUINTO AÑO',
            'nivel' => 2
        ]);
    }
}
