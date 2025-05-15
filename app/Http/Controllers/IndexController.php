<?php
namespace App\Http\Controllers;

use App\Core\Request;
use App\Models\Producto;
use App\Models\Marca;

class IndexController {
    public function index() {
        $productos = Producto::orderBy('Rand()')->limit(6)->get();
        $marcas = Marca::orderBy('nombre')->get();
            view('index/index', compact('productos', 'marcas'));

        require_once __DIR__ . '/../../../resources/views/index/index.php';
    }

         public function indexMarca($id)
    {
        $productos = Producto::orderBy('nombre')->where('id_marca', $id)->get();
        $marcas = Marca::orderBy('nombre')->where('id', $id)->get();
        view('index/showMarca', compact('productos', 'marcas'));
    }
}
?>