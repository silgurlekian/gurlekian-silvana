<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Vino Tinto',
            'descripcion' => 'Vino de alta calidad.',
            'variedad' => 'Tinto',
            'bodega' => 'Zapata',
            'precio' => 150.00,
            'cantidad' => 100,
        ]);
    }
}
