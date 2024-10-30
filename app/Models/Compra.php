<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['user_id', 'producto_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}