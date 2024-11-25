<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Llamar al procedimiento almacenado para obtener todos los productos
        $productos = DB::select('CALL sp_get_productos()');
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'talla' => 'required|numeric',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'url' => 'required|url',
        ]);

        // Llamar al procedimiento almacenado para insertar producto
        DB::select('CALL sp_ins_producto(?, ?, ?, ?, ?, ?)', [
            $request->nombre,
            $request->descripcion,
            $request->talla,
            $request->precio,
            $request->stock,
            $request->url,
        ]);

        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        // Obtener un producto específico para editar
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'talla' => 'required|numeric',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'url' => 'required|url',
        ]);

        // Llamar al procedimiento almacenado para actualizar producto
        DB::select('CALL sp_upd_producto(?, ?, ?, ?, ?, ?, ?)', [
            $id,
            $request->nombre,
            $request->descripcion,
            $request->talla,
            $request->precio,
            $request->stock,
            $request->url,
        ]);

        return redirect()->route('producto.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Llamar al procedimiento almacenado para eliminar producto
        DB::select('CALL sp_del_producto(?)', [$id]);

        return redirect()->route('producto.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
