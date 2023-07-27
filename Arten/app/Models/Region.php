<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'regions';
    protected $fillable = ['nombre'];
    public $timestamps = true;

    // Relación uno a muchos con proveedores
    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'id_region');
    }
}
