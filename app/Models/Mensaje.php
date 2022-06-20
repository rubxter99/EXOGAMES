<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    protected $table = "mensaje";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[		
        'nombres',
        'correo',
        'contenido',
        'telefono'
       
    ];
}
