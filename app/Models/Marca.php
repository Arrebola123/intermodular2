<?php
declare(strict_types=1);

namespace App\Models;
use App\Core\DB;
use App\Core\Model;

class Marca extends Model
{
    protected static string $table = 'marca';
    protected static array $fillable = ['nombre', 'logo'];
    public function insert(): void
    {
        $table = self::$table;
        $sql = "INSERT INTO $table (nombre, logo) VALUES (?, ?)";
        $params = [$this->nombre, $this->logo];
        $this->id = DB::insert($sql, $params);
    }

    /** @override */
    public function update(): void
    {
        $table = self::$table;
        $sql = "UPDATE $table
                SET nombre = ?, logo = ?
                WHERE id = ?";
        $params = [$this->nombre, $this->logo, $this->id];
        DB::update($sql, $params);
    }
}
