<?php
namespace App\Http\Controllers;
use App\Models\Producto;

class ProductoController
{
    public function index()
    {

        $productos = Producto::orderBy('nombre')->get();
        view('productos.index', compact('productos'));
    }

    public function show(int $id)
    {
        $producto = Producto::findOrFail($id);
        view('productos.show', compact('producto'));
    }

    public function create()
    {
        view('productos/create');
    }

    public function store()
    {
        $producto = new Producto($_POST);
        $producto->save();
        redirect('/productos');
    }

    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        view('productos/edit', compact('producto'));
    }
}
