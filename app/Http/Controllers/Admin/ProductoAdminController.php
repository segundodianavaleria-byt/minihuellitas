<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoAdminController extends Controller
{
    public function index()
    {
        $productos = Producto::withTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|string|max:500', // Aumentamos el límite
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'en_oferta' => 'nullable|boolean',
            'descuento_porcentaje' => 'nullable|integer|min:0|max:100',
        ]);

        $data = $request->all();
        $data['en_oferta'] = $request->has('en_oferta');
        
        Producto::create($data);
        
        return redirect()->route('admin.productos')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'en_oferta' => 'nullable|boolean',
            'descuento_porcentaje' => 'nullable|integer|min:0|max:100',
        ]);

        $data = $request->all();
        $data['en_oferta'] = $request->has('en_oferta');
        
        $producto->update($data);
        
        return redirect()->route('admin.productos')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('admin.productos')->with('success', 'Producto movido a papelera.');
    }

    public function restore($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->restore();
        return redirect()->route('admin.productos')->with('success', 'Producto restaurado exitosamente.');
    }

    public function forceDelete($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->forceDelete();
        return redirect()->route('admin.productos')->with('success', 'Producto eliminado permanentemente.');
    }

    public function updateStock(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $request->validate(['stock' => 'required|integer|min:0']);
        $producto->update(['stock' => $request->stock]);
        return redirect()->route('admin.productos')->with('success', 'Stock actualizado.');
    }
}