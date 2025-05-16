<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\DB;
use App\Core\Model;

class Categoria extends Model
{
    protected static string $table = 'categorias';
    protected static array $fillable = ['nombre'];
    public function insert(): void
    {
        $table = self::$table;
        $sql = "INSERT INTO $table (nombre) VALUES (?)";
        $params = [$this->nombre];
        $this->id = DB::insert($sql, $params);
    }

    /** @override */
    public function update(): void
    {
        $table = self::$table;
        $sql = "UPDATE $table
                SET nombre = ?
                WHERE id = ?";
        $params = [$this->nombre, $this->id];
        DB::update($sql, $params);
    }

    public function details(): ?object
    {
        $method = $this->tipo;
        return method_exists($this, $method) ? $this->$method() : null;
    }

    public function generico(): ?Generico
    {
        return Generico::find($this->id);
    }
}
