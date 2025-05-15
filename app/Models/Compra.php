<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\DB;
use App\Core\Model;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Usuario;

class Compra extends Model
{
    protected static string $table = 'comprar';
    protected static array $fillable = ['id_pedido', 'id_producto', 'id_usuario', 'cantidad'];
    protected static array $relations = ['pedido', 'producto', 'usuario'];

    public function insert(): void
    {
        $table = self::$table;
        $sql = "INSERT INTO $table (id_pedido, id_producto, id_usuario, cantidad) VALUES (?, ?, ?, ?)";
        $params = [$this->id_pedido, $this->id_producto, $this->id_usuario, $this->cantidad];
        $this->id = DB::insert($sql, $params);
    }

    /** @override */
    public function update(): void
    {
        $table = self::$table;
        $sql = "UPDATE $table
                SET id_pedido = ?, id_producto = ?, id_usuario = ?, cantidad = ?
                WHERE id = ?";
        $params = [$this->id_pedido, $this->id_producto, $this->id_usuario, $this->cantidad, $this->id];
        DB::update($sql, $params);
    }

    public function pedido(): ?Pedido
    {
        return Categoria::find((int)$this->id_pedido);
    }

    public function producto(): ?Producto
    {
        return Marca::find((int)$this->id_producto);
    }

    public function usuario(): ?Usuario
    {
        return Proveedor::find((int)$this->id_usuario);
    }
}
