<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    
    protected $table = 'proveedors';

    protected $fillable = [
        'nombre',
        'razon_social',
        'numero_proveedor',
        'fecha_registro',
        'RFC',
        'imagen_random',
        'id_region',
    ];
    public $timestamps = true;

    // Relación muchos a uno con región
    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region');
    }
}
