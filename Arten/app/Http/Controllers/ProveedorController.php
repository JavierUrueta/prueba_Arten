<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function vistaProveedor(){
        $proveedores = Proveedor::paginate(20); // 10 proveedores por página, puedes ajustar este valor según tus necesidades
        return view("proveedores")->with('proveedores', $proveedores);
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');
        $proveedores = Proveedor::where('nombre', 'like', '%' . $query . '%')
            ->orWhere('razon_social', 'like', '%' . $query . '%')
            ->orWhere('RFC', 'like', '%' . $query . '%')
            ->paginate(20);

        return view('proveedores')->with('proveedores', $proveedores);
    }

    public function busquedaEnTiempoReal(Request $request)
    {
        $query = $request->input('q');
        $proveedores = Proveedor::where('nombre', 'like', '%' . $query . '%')
            ->orWhere('razon_social', 'like', '%' . $query . '%')
            ->orWhere('RFC', 'like', '%' . $query . '%')
            ->get();

        return response()->json($proveedores);
    }
}
