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

        Producto::create([
            'nombre' => 'López Sauvignon Blanc',
            'descripcion' => 'Cosecha: Se realiza en forma manual con el objeto de mantener la integridad de las uvas, seleccionando los mejores racimos, con el fin de contar para su elaboración con las uvas de mayor calidad. El momento de realizar la cosecha depende de la madurez alcanzada por las uvas, proceso que es seguido con gran cuidado a fin de lograr el punto óptimo, donde se consigue una máxima expresión aromática. Elaboración: Obtenidos los mostos por prensa neumática, se establece un contacto íntimo con los hollejos en tanques de acero inoxidable, donde se produce la denominada maceración pelicular, a baja temperatura (5ºC durante 10 horas) con el objeto de disponer de mayor concentración de aromas propios de la variedad. Posteriormente, estos mostos plenos en aromas (liberados de los hollejos) se fermentan en tanques de acero inoxidable a baja temperatura (15ºC). Terminada la fermentación, se clarifican, se estabiliza a temperaturas de (-4ºC) y se filtra.',
            'bodega' => 'López',
            'variedad' => 'Blanco dulce',
            'precio' => 3429.00,
            'cantidad' => 25,
            'imagen' => 'images/vinos/lopez.jpg',
        ]);
    }
}
