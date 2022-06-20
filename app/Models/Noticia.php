<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $table = "noticias";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[
        'titulo',	
        'autor',
        'categoria',	
        'fecha',
        'contenido',
        'imagen'
        
    ];
}
