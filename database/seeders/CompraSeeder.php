<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Compra;

class CompraSeeder extends Seeder
{
    public function run()
    {
        // Crear una compra ficticia para el usuario
        Compra::create([
            'user_id' => 2,
            'producto_id' => 1, 
        ]);
    }
}
