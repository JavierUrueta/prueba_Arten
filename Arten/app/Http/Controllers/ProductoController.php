<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view("productos")
            ->with('productos',$productos)
            ->with('proveedores', $proveedores);
    }

    public function guardarProducto(Request $req)
    {
        if(!is_null($req -> id)){
            $producto = Producto::find($req -> id);
        }
        else{
            $producto = new Producto();
        }
        
        $producto -> nombre = $req -> nombreForm;
        $producto -> folio = $req -> folioForm;
        $producto -> cantidad = $req -> cantidadForm;
        $producto -> unidad = $req -> unidadForm;
        $producto -> precio_por_unidad = $req -> precioForm;
        $producto -> fecha_ingreso = $req -> fechaForm;
        $producto -> id_proveedor = $req -> proveedorForm;
        $producto->save();

        return redirect('/productos');
    }
    
    public function borrarProducto($id)
    {
        $producto = Producto::find($id);
        $producto -> delete();
        return redirect('/productos');
    }

    public function editaProducto(Request $req)
    {
        if(!is_null($req -> id)){
            $producto = Producto::find($req -> id);
        }
        else{
            $producto = new Producto();
        }
            
        $producto -> nombre = $req -> editNombreForm;
        $producto -> folio = $req -> editFolioForm;
        $producto -> cantidad = $req -> editCantidadForm;
        $producto -> unidad = $req -> editUnidadForm;
        $producto -> precio_por_unidad = $req -> editPrecioForm;
        $producto -> fecha_ingreso = $req -> editFechaForm;
        $producto -> id_proveedor = $req -> editProveedorForm;

        $producto->save();

        return redirect('/productos');
    }

}
