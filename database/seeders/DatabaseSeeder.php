<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Silvana Gurlekian',
            'email' => 'silvana.gurlekian@davinci.edu.ar',
            'password' => Hash::make('user123'),
            'role' => 'user'
        ]);

        User::factory()->create([
            'name' => 'Usuario con compra',
            'email' => 'usuario@mail.com',
            'password' => Hash::make('user123'),
            'role' => 'user'
        ]);

        User::factory()->create([
            'name' => 'Usuario admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        $this->call([
            ProductoSeeder::class,
            NoticiaSeeder::class,
            CompraSeeder::class,
        ]);
    }
}
