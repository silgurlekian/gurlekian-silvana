<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Noticia;

class NoticiaSeeder extends Seeder
{
    public function run()
    {
        Noticia::create([
            'titulo' => 'VALE 100 DÓLARES Y FUE CATALOGADO ENTRE LOS MEJORES MALBEC DEL MUNDO',
            'contenido' => 'Enzo Bianchi Gran Malbec 2021 recibió el trofeo de “Master” en The Global Malbec Masters 2024, una de las competencias más influyentes a nivel mundial, organizada por The Drinks Business. Con sede en Londres, The Drinks Business es una de las publicaciones más destacadas del mercado del vino y los licores. Lanzada en 2013, la competencia The Global Masters revolucionó la forma de evaluar los vinos, enfocándose únicamente en el estilo y el precio de cada etiqueta. Los jueces, compuestos por Masters of Wine, Master Sommeliers y expertos compradores, catan a ciegas vinos de distintas regiones del mundo, lo que convierte el premio «Master» en un reconocimiento de alcance global.',
            'fecha_publicacion' => now(),
            'autor' => "Silvana Gurlekian",
            'imagen' => 'images/noticias/1727288386.jpeg',
            'descripcion_imagen' => 'VALE 100 DÓLARES Y FUE CATALOGADO ENTRE LOS MEJORES MALBEC DEL MUNDO',
        ]);

        Noticia::create([
            'titulo' => 'PINOT NOIR: POR QUÉ ES UNA VARIEDAD FASCINANTE Y QUÉ VINOS DEBÉS PROBAR',
            'contenido' => 'Se celebra su día a nivel mundial y es una excelente excusa para redescubrir esta variedad a través de 14 vinos, en un viaje de Norte a Sur.
            Hay un enólogo que describe muy bien la esencia del Pinot Noir y ese es Ezequiel Ortego, de la bodega pionera Costa & Pampa, que fue de las primeras en escribir las páginas de los vinos argentinos con perfil oceánico: "En la facultad dicen que es la variedad de uva con la que te recibís de enólogo, por la dificultad que plantea hacer un buen Pinot Noir".
            Una de las dificultades está en que tiene un racimo muy apretado, por lo cual, la uva tiende a pudrirse, lo que genera que no todos los suelos y climas son ideales para esta cultivar esta variedad. A esto se suman otros factores, como una ventana de cosecha muy, muy corta; el hecho de que su color -que roza lo etereo- tienda a oxidarse y que se deba ser muy cuidadoso en bodega porque tiende a entregar sabores amargos cuando se extrae por demás.
            Pero, en todo caso, el desafío y el problema es para los enólogos y los ingenieros agrónomos. Quienes estamos del otro lado del escritorio nos llevamos, sin dudas, la parte más linda: descubrirlos, disfrutarlos.',
            'fecha_publicacion' => now(),
            'autor' => "Silvana Gurlekian",
            'imagen' => 'images/noticias/1727288474.jpeg',
            'descripcion_imagen' => 'VALE 100 DÓLARES Y FUE CATALOGADO ENTRE LOS MEJORES MALBEC DEL MUNDO',
        ]);
    }
}
