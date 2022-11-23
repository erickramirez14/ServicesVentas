<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $table = "detalle_venta";
    protected $fillable = ['v_clave', 'p_clave', 'u_clave', 'p_cantidad', 'p_costo'];
    public $timestamps = false;
}
