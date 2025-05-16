<?php
namespace App\Http\Controllers;
use App\Models\Marca;

class MarcaController
{
    public function index()
    {
        $marcas = Marca::orderBy('nombre')->get();
        view('index/index', compact('marcas'));
    }

    public function show(int $id)
    {
        $marca = Marca::findOrFail($id);
        view('marcas.show', compact('marca'));
    }

    public function create()
    {
        view('marcas/create');
    }

    public function store()
    {
        $marca = new Marca($_POST);
        $marca->save();
        redirect('/marcas');
    }

    public function edit(string $id)
    {
        $marca = Marca::findOrFail($id);
        view('marcas/edit', compact('marca'));
    }
}
