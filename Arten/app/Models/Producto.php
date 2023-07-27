<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    // Relación muchos a uno con región
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id');
    }

    protected $fillable = [
        'nombre',
        'folio',
        'cantidad',
        'unidad',
        'precio_por_unidad',
        'fecha_ingreso',
        'id_proveedor',
    ];
    public $timestamps = true;

}
