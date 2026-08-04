<?php
require_once __DIR__ . '/../database.php';

class Plantilla
{
    public static function defaults(): array
    {
        return [];
    }

    public static function listar(): array
    {
        $db = getDB();
        $rows = $db->query("SELECT * FROM plantillas ORDER BY created_at DESC")->fetchAll();
        return array_merge(self::defaults(), $rows);
    }

    public static function findById(int $id): ?array
    {
        foreach (self::defaults() as $d) {
            if ((int) $d['id'] === $id) {
                return $d;
            }
        }
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM plantillas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function crear(string $nombre, string $icono, string $color, string $piezasJson, ?int $tipoInformeId, string $scope = 'private'): int
    {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO plantillas (nombre, icono, color, scope, tipo_informe_id, piezas_json) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([trim($nombre), $icono, $color, $scope, $tipoInformeId ?: null, $piezasJson]);
        return (int) $db->lastInsertId();
    }

    public static function eliminar(int $id): bool
    {
        $p = self::findById($id);
        if (!$p || in_array($p['scope'], ['default', 'global'], true)) {
            return false;
        }
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM plantillas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
}