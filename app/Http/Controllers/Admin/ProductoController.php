<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->paginate(10);
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
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
        ]);
        
        Producto::create($request->all());
        return redirect()->route('admin.productos.index')->with('success', 'Producto creado.');
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
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
        ]);
        
        $producto->update($request->all());
        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado.');
    }
    
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado.');
    }
    
    public function actualizarStock(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $request->validate(['stock' => 'required|integer|min:0']);
        $producto->update(['stock' => $request->stock]);
        return redirect()->back()->with('success', 'Stock actualizado.');
    }
}