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
            'nombre' => 'Trapiche Reserva',
            'descripcion' => 'Vino de alta calidad.',
            'variedad' => 'Tinto Malbec',
            'bodega' => 'Zapata',
            'precio' => 5484.60,
            'cantidad' => 100,
            'imagen' => 'images/vinos/trapiche-reserva.jpg',
        ]);

        Producto::create([
            'nombre' => 'El Esteco',
            'descripcion' => 'Vino de alta calidad.',
            'variedad' => 'Tinto Pinot Noir',
            'bodega' => 'Don David',
            'precio' => 5081.40,
            'cantidad' => 10,
            'imagen' => 'images/vinos/el-esteco.jpg',
        ]);
    }
}
