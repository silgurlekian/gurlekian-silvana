<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Compra;

class CompraSeeder extends Seeder
{
    public function run()
    {
        Compra::create([
            'user_id' => 2,
            'producto_id' => 1, 
            'cantidad' => 3, 
            'total' => 4520.50
        ]);
    }
}
