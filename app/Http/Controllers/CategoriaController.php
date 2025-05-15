<?php
namespace App\Http\Controllers;
use App\Models\Categoria;

class CategoriaController
{
    public function index()
    {
        $productos = Categoria::all();
        view('productos/index', compact('productos'));
    }

    public function show(string $id)
    {
        $producto = Categoria::findOrFail($id);
        view('productos/show', compact('producto'));
    }

    public function create()
    {
        view('productos/create');
    }

    public function store()
    {
        $producto = new Categoria($_POST);
        $producto->save();
        redirect('/productos');
    }

    public function edit(string $id)
    {
        $producto = Categoria::findOrFail($id);
        view('productos/edit', compact('producto'));
    }
}
