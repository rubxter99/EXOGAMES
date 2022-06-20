<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segunda extends Model
{
    use HasFactory;
    protected $table = "segunda_mano";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'idUsuario',
        'nombre',	
        'descripcion',
        'comentario',	
        'valoracion',
        'idCategoria',
        'precio',
        'imagen',
        'fecha',
        
        
    ];
}
