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
            'descripcion' => 'Intenso color rojo violáceo.
            De aromas dulces a moras y ciruelas en nariz, se perciben notas ahumadas con una elegante presencia de vainilla.
            De textura aterciopelada y final en boca amable y persistente.',
            'variedad' => 'Tinto Malbec',
            'bodega' => 'Zapata',
            'precio' => 5484.60,
            'cantidad' => 100,
            'imagen' => 'images/vinos/trapiche-reserva.jpg',
        ]);

        Producto::create([
            'nombre' => 'El Esteco',
            'descripcion' => 'Color: Violáceos, vivaz. Profundo con tonalidades negras. El tipo de lágrima formada en la copa denota una muy buena estructura y concentración.
            Aroma: Elevada intensidad aromática. Encontramos notas especiadas, clavo de olor, chocolate blanco y vainilla.
            Sabor: Taninos con gran estructura, representativos del varietal. Percepción de especias y roble. Largo final y elegante bouquet.',
            'variedad' => 'Tinto Pinot Noir',
            'bodega' => 'Don David',
            'precio' => 5081.40,
            'cantidad' => 10,
            'imagen' => 'images/vinos/el-esteco.jpg',
        ]);
    }
}
