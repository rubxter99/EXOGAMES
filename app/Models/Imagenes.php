<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;
    protected $table = "imagenes";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable=[	
        'idProducto',	
        'imagen',	
    ];
}
