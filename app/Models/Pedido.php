<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\DB;
use App\Core\Model;
use App\Models\Usuario;


class Pedido extends Model
{
    protected static string $table = 'pedidos';
    protected static array $fillable = ['fecha', 'estado', 'precio', 'id_usuario'];
    protected static array $relations = ['usuario'];

    public function insert(): void
    {
        $table = self::$table;
        $sql = "INSERT INTO $table (fecha, estado, precio, id_usuario) VALUES (CURDATE(), 0, ?, ?)";
        $params = [$this->fecha, $this->estado, $this->precio, $this->id_usuario];
        $this->id = DB::insert($sql, $params);
    }

    /** @override */
    public function update(): void
    {
        $table = self::$table;
        $sql = "UPDATE $table
                SET fecha = ?, estado = ?, precio = ?, id_usuario = ?
                WHERE id = ?";
        $params = [ $this->fecha ,$this->estado, $this->precio, $this->id_usuario, $this->id];
        DB::update($sql, $params);
    }

    public function Usuario(): ?Usuario
    {
        return Categoria::find((int)$this->id_usuario);
    }
}
