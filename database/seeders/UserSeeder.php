<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ARCE MACHUCA JOSÉ SEBASTIÁN',
            'email' => 'jarcem@unitru.edu.pe',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Dalila Salazar',
            'email' => 'dsalazart@unitru.edu.pe',
            'password' => Hash::make('12345678'),
        ]);

        Teacher::create([
            'user_id' => 2,
            'nombres' => 'Dalila',
            'apellidos' => 'Salazar',
            'fecha_nacimiento' => '1997-10-01',
            'dni' => '93993838',
            'direccion' => 'Jasmines 120',
            'telefono' => '928384747',
            'especialidad' => 'Sistemas',
        ]);
    }
}
