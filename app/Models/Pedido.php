<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = "pedidos";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[		
        'idUsuario',
        'idSegunda',
        'codigo',
        'fecha',
        'preciototal',
        'cantidad',
        'idDireccion',
       
    ];
}
