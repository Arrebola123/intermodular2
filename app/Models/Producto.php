<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\DB;
use App\Core\Model;
use App\Models\Categoria;
use App\Models\Marca;

class Producto extends Model
{
    protected static string $table = 'productos';
    protected static array $fillable = ['nombre', 'numero_de_modelo', 'descripcion', 'materiales', 'movimiento', 'resistencia_al_agua', 'cristal', 'precio', 'stock_disponible', 'imagen1', 'id_categoria', 'id_proveedor', 'id_marca'];
    protected static array $relations = ['categoria', 'marca', 'proveedor'];

    public function insert(): void
    {
        $table = self::$table;
        $sql = "INSERT INTO $table (nombre, numero_de_modelo, descripcion, materiales, movimiento, resistencia_al_agua, cristal, precio, stock_disponible, imagen1, id_categoria, id_proveedor, id_marca) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$this->nombre, $this->numero_de_modelo, $this->descripcion, $this->materiales, $this->movimiento, $this->resistencia_al_agua, $this->cristal, $this->precio, $this->stock_disponible, $this->imagen1, $this->id_categoria, $this->id_proveedor, $this->id_marca];
        $this->id = DB::insert($sql, $params);
    }

    /** @override */
    public function update(): void
    {
        $table = self::$table;
        $sql = "UPDATE $table
                SET nombre = ?, numero_de_modelo = ?, descripcion = ?, materiales = ?, movimiento = ?, resistencia_al_agua = ?, cristal = ?, precio = ?, stock_disponible = ?, imagen1 = ?, id_categoria = ?, id_proveedor = ?, id_marca = ?
                WHERE id = ?";
        $params = [$this->nombre, $this->numero_de_modelo, $this->descripcion, $this->materiales, $this->movimiento, $this->resistencia_al_agua, $this->cristal, $this->precio, $this->stock_disponible, $this->imagen1, $this->id_categoria, $this->id_proveedor, $this->id_marca, $this->id];
        DB::update($sql, $params);
    }

    public function categoria(): ?Categoria
    {
        return Categoria::find((int)$this->id_categoria);
    }

    public function marca(): ?Marca
    {
        return Marca::find((int)$this->id_marca);
    }

    public function proveedor(): ?Proveedor
    {
        return Proveedor::find((int)$this->id_proveedor);
    }
}
