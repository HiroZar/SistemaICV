<?php

namespace Database\Seeders;

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
    }
}
