<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $table = "detalle";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'idPedido',
        'idUsuario',
        'idProducto',
        'cantidad',
        'precio',
        'fecha',
    ];

}
